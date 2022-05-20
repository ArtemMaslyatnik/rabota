<?php

namespace frontend\modules\resume\models\forms;


use Yii;
use yii\base\Model;
use yii\helpers\ArrayHelper;
use frontend\models\Profession;
use frontend\models\Category;
use frontend\modules\resume\models\Resume;
use frontend\modules\resume\models\ResumeEducation;
use frontend\modules\resume\models\ResumeExperience;


class VacancyForm extends Model
{

    //const MAX_DESCRIPTION_LENGHT = 2000;
    //const EVENT_POST_CREATED = 'post_created';

   // public $picture;
   // public $description;
    
    public $address;
    public $activity_company;
    public $date_of_birth;
    public $date_modified;
    public $date_added;
    public $date_from;
    public $date_by;
    public $date_exp_by;
    public $date_exp_from;
    public $city_id;
    public $company;
    public $faculty_specialty;
    public $email;
    public $employment_id;
    public $educational_institution;
    public $education_details;
    public $name;
    public $phone;
    public $patronymic;
    public $profession_id;
    public $resume_id;
    public $responsibilities;
    public $salary;
    public $surname;
    
/**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date_exp_by', 'date_exp_from', 'resume_id',  'date_from', 'date_by', 'date_of_birth', 'city_id', 'profession_id', 'employment_id', 'salary', 'date_added', 'date_modified'], 'integer'],
            [['company', 'activity_company', 'educational_institution', 'faculty_specialty', 'education_details', 'surname', 'name', 'patronymic', 'phone', 'email', 'address'], 'string', 'max' => 255],
            [['responsibilities'], 'string'],
        ];
    }



    /**
     * @inheritdoc
     
    public function rules()
    {
         return [
              [['category_id', 'city_id', 'employment_id', 'education_id', 'profession_id', 'practice', 'payment' ], 'integer'],
              [['vacancy_description'], 'string'],
              [['company'], 'string', 'max' => 255],
              [['email', 'category_id', 'city_id', 'employment_id', 'education_id', 'profession_id', 'practice', 'payment', 'vacancy_description', 'company' ], 'required'], 
              ['email', 'email'],
        ];
    }
     */
    /**
     * @param User $user
     */
   // public function __construct(User $user)
    //{
 //       $this->user = $user;
//        $this->on(self::EVENT_POST_CREATED, [Yii::$app->feedService, 'addToFeeds']);
    //} 
 
    /**
     * @return boolean
     */
    public function save()
    {
        if ($this->validate()) {      
            $resume = new Resume();
            $resume->address = $this->vacancy_description;
            $resume->city_id = time();
            $resume->date_added = $this->user->getId();
            $resume->date_modified = $this->city_id;
            $resume->date_of_birth = $this->company;
            $resume->email = $this->payment;
            $resume->employment_id = $this->education_id;
            $resume->name = $this->employment_id;
            $resume->patronymic = $this->practice;
            $resume->profession_id = $this->profession_id;
            $resume->phone = $this->category_id;
            $resume->salary = $this->email;

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

