<?php

namespace frontend\modules\vacancy\controllers;

use Yii;
use yii\web\Controller;
use frontend\modules\vacancy\models\forms\VacancyForm;
use frontend\modules\vacancy\models\Vacancy;
use yii\data\ActiveDataProvider;

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
        $dataProvider = new ActiveDataProvider([
           'query' => Vacancy::find(),
           'pagination' => [
               'pageSize' => 20,
           ],           
       ]);
        return $this->render('index', [
           'dataProvider' => $dataProvider 
        ]);
    }
    
    public function actionCreate()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['/user/default/login']);
        }
        

        $model = new VacancyForm(Yii::$app->user->identity);
        
        if ($model->load(Yii::$app->request->post())) {
            
            if ($model->save()) {
                
                Yii::$app->session->setFlash('success', 'Vacancy created!');
                return $this->goHome();
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
    
     /**
     * Displays a single Vacancy model.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    
      /**
     * Finds the Vacancy model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Vacancy the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Vacancy::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
