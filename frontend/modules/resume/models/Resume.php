<?php

namespace frontend\modules\resume\models;

use frontend\modules\resume\models\ResumeExperience;
use frontend\modules\resume\models\ResumeEducation;
use frontend\models\Profession;
use frontend\models\City;
use frontend\models\Employment;
use frontend\models\Education;
use Yii;

use yii\helpers\ArrayHelper;
use lhs\Yii2SaveRelationsBehavior\SaveRelationsBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "resume".
 *
 * @property int $id
 * @property string $surname
 * @property string $name
 * @property string|null $patronymic
 * @property string $phone
 * @property stringl $email
 * @property int $date_of_birth
 * @property int $city_id
 * @property int $profession_id
 * @property int $employment_id
 * @property int|null $salary
 * @property string $address
 * @property int $date_added
 * @property int $date_modified
 */
class Resume extends \yii\db\ActiveRecord
{
    
    // use SaveRelationsTrait; // Optional
    
    /**
     *
    */ 
     public function behaviors()
    {
        return [
            TimestampBehavior::className(),        
        ];
    }

    /**
     * transactions SaveRelationsBehavior
     * 
     
    public function transactions()
    {
        return [
            self::SCENARIO_DEFAULT => self::OP_ALL,
        ];
    }    
    */
    
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['city_id', 'profession_id', 'employment_id', 'salary'], 'integer'],
            [[ 'surname', 'name', 'patronymic', 'phone', 'email', 'address'], 'string', 'max' => 255],
            ['date_of_birth', 'date', 'timestampAttribute' => 'date_of_birth'],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'resume';
    }

    
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'surname' => 'Surname',
            'name' => 'Name',
            'patronymic' => 'Patronymic',
            'phone' => 'Phone',
            'email' => 'Email',
            'date_of_birth' => 'Date Of Birth',
            'city_id' => 'City ID',
            'profession_id' => 'Profession ID',
            'employment_id' => 'Employment ID',
            'salary' => 'Salary',
            'address' => 'Address',
            'date_added' => 'Date Added',
            'date_modified' => 'Date Modified',
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
    
                    
    public function getResumeeducation()
    {
        return $this->hasMany(ResumeEducation::class, ['resume_id' => 'id']);
    }
    
    public function getResumeexperience()
    {
        return $this->hasMany(ResumeExperience::class, ['resume_id' => 'id']);
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
    
}
