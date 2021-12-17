<?php

namespace frontend\modules\vacancy\models\forms;


use Yii;
use yii\base\Model;
use frontend\models\User;
use frontend\modules\vacancy\models\Vacancy;
use yii\helpers\ArrayHelper;
use app\models\Profession;
use frontend\models\Category;




class VacancyForm extends Model
{

    //const MAX_DESCRIPTION_LENGHT = 2000;
    //const EVENT_POST_CREATED = 'post_created';

   // public $picture;
   // public $description;
    
    public $category_id;
    public $company;
    public $profession_id;
    public $city_id;
    public $employment_id;
    public $practice;
    public $education_id;
    public $vacancy_description;
    public $payment;
    
 
    private $user;

    /**
     * @inheritdoc
     */
    public function rules()
    {
         return [
              [['category_id', 'city_id', 'employment_id', 'education_id', 'profession_id', 'practice', 'payment' ], 'integer'],
              [['vacancy_description'], 'string'],
              [['company'], 'string', 'max' => 255],
              [['category_id', 'city_id', 'employment_id', 'education_id', 'profession_id', 'practice', 'payment', 'vacancy_description', 'company' ], 'required'], 
        ];
    }
    
    /**
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
//        $this->on(self::EVENT_POST_CREATED, [Yii::$app->feedService, 'addToFeeds']);
    }
    
 
    /**
     * @return boolean
     */
    public function save()
    {
        if ($this->validate()) {      
            $vacancy = new Vacancy();
            $vacancy->vacancy_description = $this->vacancy_description;
            $vacancy->vacancy_created_at = time();
            $vacancy->user_id = $this->user->getId();
            $vacancy->city_id = $this->city_id;
            $vacancy->company = $this->company;
            $vacancy->payment = $this->payment;
            $vacancy->education_id = $this->education_id;
            $vacancy->employment_id = $this->employment_id;
            $vacancy->practice = $this->practice;
            $vacancy->profession_id = $this->profession_id;
            $vacancy->category_id = $this->category_id;
            $vacancy->save();  
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

        return ArrayHelper::map(Category::getСategory(), 'id', 'name');

        }    
    
    
}

