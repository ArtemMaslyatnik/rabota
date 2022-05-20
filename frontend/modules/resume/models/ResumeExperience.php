<?php

namespace frontend\modules\resume\models;
use frontend\models\Profession;
use frontend\models\City;
use Yii;

/**
 * This is the model class for table "resume_experience".
 *
 * @property int $id
 * @property int|null $profession_id
 * @property int|null $city_id
 * @property string|null $company
 * @property string|null $activity_company
 * @property string|null $responsibilities
 * @property int|null $date_from
 * @property int|null $date_by
 */
class ResumeExperience extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'resume_experience';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date_from', 'date_by', 'resume_id', 'city_id', 'profession_id', 'company', 'activity_company'], 'required'],
            [['profession_id', 'city_id', ], 'integer'],
            [['responsibilities'], 'string'],
            [['company', 'activity_company'], 'string', 'max' => 255],
            ['date_from', 'date', 'timestampAttribute' => 'date_from'],
            ['date_by', 'date', 'timestampAttribute' => 'date_by'],
            ['date_by', 'compare', 'compareAttribute' => 'date_from', 'operator' => '>=', 'enableClientValidation' =>false],
          ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'profession_id' => 'Profession ID',
            'city_id' => 'City ID',
            'company' => 'Company',
            'activity_company' => 'Activity Company',
            'responsibilities' => 'Responsibilities',
            'date_from' => 'Date From',
            'date_by' => 'Date By',
        ];
    }
    
     /**
     * Get city of the resume education
     * @return City|null
     */
    public function getCity()
    {
        return $this->hasOne(City::className(), ['id' => 'city_id']);
    }
    
    
     /**
     * Get profession of the vacancy
     * @return Profession|null
     */
    public function getProfession()
    {
        return $this->hasOne(Profession::className(), ['id' => 'profession_id']);
    }
    
    
    public static function getProfessionList() {
        $sql = "SELECT * FROM profession";
        $result = \Yii::$app->db->createCommand($sql)->queryAll();
        return \yii\helpers\ArrayHelper::map($result, 'id', 'name');
    }
    
    public function getCityList() {
        $sql = "SELECT * FROM city";
        $result = Yii::$app->db->createCommand($sql)->queryAll();
        return \yii\helpers\ArrayHelper::map($result, 'id', 'name');
    }
}
