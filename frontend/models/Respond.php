<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "respond".
 *
 * @property int $id
 * @property int|null $vacancy_id
 * @property string|null $name
 * @property string|null $phone
 * @property string|null $email
 */
class Respond extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'respond';
    }
    
     /**
     * @var UploadedFile
     */
    //public $imageFile;
    
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['vacancy_id', 'phone'], 'integer'],
            [['name', 'phone', 'email', 'transmittalletter', ], 'required'],
            [['name', 'phone', 'email', 'transmittalletter', ], 'string', 'max' => 255],
            ['email', 'email'],
           // [['fileresume'], 'file',
           //    'skipOnEmpty' => false,
           //    'extensions' => ['doc', 'docx', 'txt'],
           //    'checkExtensionByMimeType' => false,],
        ];
    }
    
        public function __construct($id)
    {
        $this->vacancy_id = $id;
    } 

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'vacancy_id' => 'Vacancy ID',
            'name' => 'Name',
            'phone' => 'Phone',
            'email' => 'Email',
            'transmittalletter' => 'Transmittalletter',
            'fileresume' => 'Fileresume',
        ];
    }
    
    
    public function upload()
    {
        if ($this->validate()) {
            $this->fileresume->saveAs($this->getStoragePath() . $this->fileresume->baseName . '.' . $this->fileresume->extension);
            return true;
        } else {
            return false;
        }
    }
     /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
     public function sendEmail($from, $to, $Subject, $TextBody, $puth)
    {
        return Yii::$app->mailer->compose()
                ->setFrom($from)
                ->setTo($to)
                ->setSubject($Subject)
                ->setTextBody($TextBody)
                ->attach($puth)
                ->send();
    }
    
         /**
     * @return string
     */
    public function getStoragePath()
    {
        return Yii::getAlias(Yii::$app->params['storagePath']);
    }
}
