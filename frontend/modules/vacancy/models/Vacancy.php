<?php

namespace frontend\modules\vacancy\models;

use Yii;
use frontend\models\Profession;
use frontend\models\City;
use frontend\models\Employment;
/**
 * This is the model class for table "vacancy".
 *
 * @property int $id
 * @property int|null $user_id
 * @property string|null $profession_id
 * @property string|null $company
 * @property int|null $city_id
 * @property int|null $employment_id
 * @property int|null $education_id
 * @property int|null $practice
 * @property int|null $payment
 * @property string|null $vacancy_description
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
}
