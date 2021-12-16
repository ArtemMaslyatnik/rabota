<?php

namespace frontend\modules\vacancy\models;


use Yii;


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
        ];
    }
    

}
