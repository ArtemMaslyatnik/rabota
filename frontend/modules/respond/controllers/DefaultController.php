<?php

namespace frontend\modules\respond\controllers;

use Yii;
use yii\web\Controller;
use frontend\modules\vacancy\models\Vacancy;
use frontend\models\Respond;
use yii\web\UploadedFile;
/**
 * Default controller for the `respond` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
    
     /**
     * Displays a respond model.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $puth = "";
        
        
        
        $respond = new Respond($id);
        $modelVacancy = Vacancy::findOne($id);


                
        if ($respond->load(Yii::$app->request->post())) {
            $respond->fileresume = UploadedFile::getInstance($respond,'fileresume');
             if ($respond->save()) {
                $respond->upload();
                $puth = $respond->getStoragePath();
                $puth = $puth .$respond->fileresume->baseName . '.' . $respond->fileresume->extension;
                self::/swesx f653                $subject = Yii::$app->params['subjectMail'].' '.$modelVacancy->profession->name;
                $TextBody = $respond->transmittalletter.
                        '<br/><br/> from the applicant '. 
                        $respond->name.
                        '<br/>phone '.
                        $respond->phone;
                
                $respond->sendEmail($respond->email, $modelVacancy->email, $subject, $TextBody, $puth);
                Yii::$app->session->setFlash('success', 'job application sent!');
                return $this->goHome();
            }
        }

        return $this->render('view', [
            'model' => $respond,
            'modelVacancy' => $modelVacancy,
            'm' => $puth, 
        ]);
    }
    
   
}
