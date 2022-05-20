<?php

namespace frontend\modules\resume\models;
use frontend\models\City;
use Yii;
use yii\helpers\ArrayHelper;





/**
 * This is the model class for table "resume_education".
 *
 * @property int $id
 * @property int|null $resume_id
 * @property string|null $educational_institution
 * @property string|null $faculty_specialty
 * @property int|null $city_id
 * @property string|null $education_details
 * @property int|null $date_from
 * @property int|null $date_by
 */
class ResumeEducation extends \yii\db\ActiveRecord
{
    
    /**[\
     *
     
     public function behaviors()
    {
        
         
    }
  */
    
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'resume_education';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date_from', 'date_by', 'resume_id', 'city_id', 'educational_institution', 'faculty_specialty'], 'required'],
            [['resume_id', 'city_id',], 'integer'],
            [['educational_institution', 'faculty_specialty', 'education_details'], 'string', 'max' => 255],
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
            'resume_id' => 'Resume ID',
            'educational_institution' => 'Educational Institution',
            'faculty_specialty' => 'Faculty Specialty',
            'city_id' => 'City ID',
            'education_details' => 'Education Details',
            'date_from' => 'Date From',
            'date_by' => 'Date By',
        ];
    }
    
    public function checkDate($attribute, $params){
        // Атрибут с чем сравниваем, в данной задаче date_from
        $compareAttribute = $params['compareAttribute'];
        // Параметр указывающий нужно ли проверять атрибут если он уже имеет ошибку
        $skipOnError = isset($params['skipOnError']) && $params['skipOnError'] === true;
        // Сообщение об ошибке
        $message = isset($params['message']) ? $params['message'] : 'incorrect dates';
        // проверяем нет ли уже ошибок
        if ( !$params['skipOnError'] && !$this->hasErrors($attribute) ){
            if ($this->$attribute < $this->$compareAttribute) {
                // Добавим ошибку для проверяемого атрибута
                $this->addError($attribute, $message);
            }
        }
    }
    
    /**
     * Get city of the resume education
     * @return City|null
     */
    public function getCity()
    {
        return $this->hasOne(City::className(), ['id' => 'city_id']);
    }
    
    
    
    public function getCityList() {
        $sql = "SELECT * FROM city";
        $result = Yii::$app->db->createCommand($sql)->queryAll();
        return ArrayHelper::map($result, 'id', 'name');
    }
}
