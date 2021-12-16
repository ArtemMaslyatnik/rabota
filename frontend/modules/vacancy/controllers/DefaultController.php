<?php

namespace frontend\modules\vacancy\controllers;

use Yii;
use yii\web\Controller;
use frontend\modules\vacancy\models\forms\VacancyForm;

/**
 * Default controller for the `vacancy` module
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
    
    public function actionCreate()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['/user/default/login']);
        }
        

        $model = new VacancyForm(Yii::$app->user->identity);
        
        if ($model->load(Yii::$app->request->post())) {
            
            //
            //$model->picture = UploadedFile::getInstance($model, 'picture');
            //
            
            if ($model->save()) {
                
                Yii::$app->session->setFlash('success', 'Vacancy created!');
                return $this->goHome();
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
}
