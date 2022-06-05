<?php

namespace frontend\modules\resume\models\forms;


use Yii;
use yii\base\Model;
use yii\helpers\ArrayHelper;
use frontend\models\Profession;
use frontend\models\Category;
use frontend\modules\resume\models\Resume;
use frontend\models\User;

class ResumeForm extends Model
{

    public $address;
    public $date_of_birth;
    public $city_id;
    public $email;
    public $employment_id;
    public $name;
    public $phone;
    public $patronymic;
    public $profession_id;
    public $resume_id;
    public $responsibilities;
    public $salary;
    public $surname;
    private $user;
    
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['city_id', 'profession_id', 'employment_id', 'salary'], 'integer'],
            [['surname', 'name', 'patronymic', 'phone', 'email', 'address'], 'string', 'max' => 255],
            ['date_of_birth', 'date', 'timestampAttribute' => 'date_of_birth'],
            [['city_id', 'profession_id', 'employment_id', 'surname', 'name', 'phone', 'email'], 'required'],
            [['email'], 'email'],
        ];
    }


/**
     * @param User $user
     */
    public function __construct(User $user) {
        $this->user = $user;
  } 
 
    /**
     * @return boolean
     */
    public function save()
    {
        if ($this->validate()) {      
            $resume = new Resume();
            $resume->address = $this->address;
            $resume->city_id = $this->city_id;
            $resume->date_of_birth = $this->date_of_birth;
            $resume->email = $this->email;
            $resume->employment_id = $this->employment_id;
            $resume->surname = $this->surname;
            $resume->name = $this->name;
            $resume->patronymic = $this->patronymic;
            $resume->profession_id = $this->profession_id;
            $resume->phone = $this->phone;
            $resume->salary = $this->salary;
            $resume->user_id = $this->user->getId();

            $resume->save();  
            return true;
          }

        return false;

    }
    
   
    
    public function getCityList() {
        $sql = "SELECT * FROM city";
        $result = Yii::$app->db->createCommand($sql)->queryAll();
        return ArrayHelper::map($result, 'id', 'name');
    }
    
    public static function getProfessionList() {
        return ArrayHelper::map(Profession::find()->all(), 'id', 'name');
    }
    
    public function getEmploymentList() {
        $sql = "SELECT * FROM employment";
        $result = Yii::$app->db->createCommand($sql)->queryAll();
        return ArrayHelper::map($result, 'id', 'name');
    }
    
    public function getEducationList() {
        $sql = "SELECT * FROM education";
        $result = Yii::$app->db->createCommand($sql)->queryAll();
        return ArrayHelper::map($result, 'id', 'name');
    }
    
    public function getСategoryList() {

        return ArrayHelper::map(Category::find()->all(), 'id', 'name');

    }    
    
    
}

