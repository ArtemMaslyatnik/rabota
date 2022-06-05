<?php

namespace frontend\modules\vacancy\models;

use Yii;
use frontend\models\Profession;
use frontend\models\City;
use frontend\models\Employment;
use frontend\models\Education;
use yii\helpers\ArrayHelper;
use frontend\models\Category;

/**
 * This is the model class for table "vacancy".
 *
 * @property int $id
 * @property int $user_id
 * @property string $profession_id
 * @property string $company
 * @property int $city_id
 * @property int $employment_id
 * @property int $education_id
 * @property int|null $practice
 * @property int|null $payment
 * @property string $vacancy_description
 * @property int $vacancy_created_at
 */
class Vacancy extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vacancy';
    }
    
        public function rules()
    {
         return [
              [['category_id', 'city_id', 'employment_id', 'education_id', 'profession_id', 'practice', 'payment' ], 'integer'],
              [['vacancy_description'], 'string'],
              [['company'], 'string', 'max' => 255],
              [['email', 'category_id', 'city_id', 'employment_id', 'education_id', 'profession_id',  'vacancy_description', 'company' ], 'required'], 
              ['email', 'email'],
        ];
    }



    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'profession_id' => 'Profession ID',
            'company' => 'Company',
            'city_id' => 'City ID',
            'employment_id' => 'Employment ID',
            'education_id' => 'Education ID',
            'practice' => 'Practice',
            'payment' => 'Payment',
            'vacancy_description' => 'Vacancy Description',
            'vacancy_created_at' => 'Vacancy Created At',
            'category_id' => 'Сategory ID',
            'email' => 'Email',
        ];
    }
    
     /**
     * Get profession of the vacancy
     * @return Profession|null
     */
    public function getProfession()
    {
        return $this->hasOne(Profession::className(), ['id' => 'profession_id']);
    }
    
    /**
     * Get city of the vacancy
     * @return City|null
     */
    public function getCity()
    {
        return $this->hasOne(City::className(), ['id' => 'city_id']);
    }
    
             /**
     * Get employment of the vacancy
     * @return Employment|null
     */
    public function getEmployment()
    {
        return $this->hasOne(Employment::className(), ['id' => 'employment_id']);
    }
    
    
     /**
     * Get education of the vacancy
     * @return Education|null
     */
    public function getEducation()
    {
        return $this->hasOne(Education::className(), ['id' => 'education_id']);
    }
    
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }
    
    
    public function getСategoryList() {

        return ArrayHelper::map(Category::find()->all(), 'id', 'name');

    } 
    
    public static function getProfessionList() {
        return ArrayHelper::map(Profession::find()->all(), 'id', 'name');
    }
    
    public function getCityList() {
        $sql = "SELECT * FROM city";
        $result = Yii::$app->db->createCommand($sql)->queryAll();
        return ArrayHelper::map($result, 'id', 'name');
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
}
