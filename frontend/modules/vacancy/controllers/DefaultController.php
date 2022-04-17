<?php

namespace frontend\modules\vacancy\controllers;

use frontend\modules\vacancy\models\Vacancy;
use frontend\modules\vacancy\models\VacancySearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\modules\vacancy\models\forms\VacancyForm;



/**
 * DefaultController implements the CRUD actions for Vacancy model.
 */
class DefaultController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Vacancy models.
     * @return mixed
     */
    public function actionIndex()
    {

 //       $dataProvider = new ActiveDataProvider([
 //          'query' => Vacancy::find(),
 //          'pagination' => [
 //              'pageSize' => 20,
 //          ],           
 //      ]);
//        return $this->render('index', [
  //         'dataProvider' => $dataProvider 

        $searchModel = new VacancySearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
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
         /* @var $currentUser User */
        $currentUser = Yii::$app->user->identity;
        return $this->render('view', [
            'model' => $this->findModel($id),
            'currentUser' => $currentUser,
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
     * Updates an existing Vacancy model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Vacancy model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
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
    
    public function actionListVacancyByCategory($id)
    {
        $searchModel = new VacancySearch();
        $dataProvider = $searchModel->search($this->request->queryParams, $id);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
        public function actionListVacancyByCity($id)
    {
        $searchModel = new VacancySearch();
        $dataProvider = $searchModel->search($this->request->queryParams, null ,$id);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
        /**
     * Updates an existing Vacancy model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionRespond($id)
    {
        $model = $this->findModel($id);

       // if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
       //     return $this->redirect(['view', 'id' => $model->id]);
       // }

        return $this->render('respond', [
            'model' => $model,
        ]);
    }
    
    public function actionListOfVacancies()
    {
        $id = Yii::$app->user->id;
        $searchModel = new VacancySearch();
        $dataProvider = $searchModel->search($this->request->queryParams, null, null, $id);

        return $this->render('lstOfVacancies', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    

}
