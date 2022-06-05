<?php

namespace frontend\modules\resume\controllers;

use Yii;
use frontend\modules\resume\models\Resume;
use frontend\modules\resume\models\ResumeSearch;
use frontend\modules\resume\models\ResumeEducation;
use frontend\modules\resume\models\ResumeExperience;
use frontend\modules\resume\models\forms\ResumeForm;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\ForbiddenHttpException;


/**
 * DefaultController implements the CRUD actions for Resume model.
 */
class DefaultController extends Controller {

    /**
     * @inheritDoc
     */
    public function behaviors() {
        return array_merge(
                parent::behaviors(),
                [
                    'verbs' => [
                        'class' => VerbFilter::className(),
                        'actions' => [
                            'delete' => ['POST'],
                        ],
                    ],
//                    'access' => [
//                        'class' => AccessControl::class,
//                        'rules' => [
//                            [
//                                'allow' => true,
//                                'actions' => ['index', 'view'],
//                                'roles' => ['admin', 'employer', 'applicant'],
//                            ],
//                            [
//                                'allow' => true,
//                                'actions' => ['create', 'update', 'delete', 'addeducation', 'addexperience'],
//                                'roles' => ['admin', 'applicant'],
//                            ],
//                        ],
//                    ],
                ]
        );
    }

    /**
     * Lists all Resume models.
     *
     * @return string
     */
    public function actionIndex() {
        $searchModel = new ResumeSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Resume model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {
        $model = $this->findModel($id);
        $dataproviderEducation = new ActiveDataProvider([
            'query' => ResumeEducation::find()->andFilterWhere(['resume_id' => $id]),
            ]);

        $dataproviderExperience = new ActiveDataProvider([
            'query' => ResumeExperience::find()->andFilterWhere(['resume_id' => $id]),
            ]);

        return $this->render('view', [
                    'model' => $model,
                    'dataproviderExperience' => $dataproviderExperience,
                    'dataproviderEducation' => $dataproviderEducation,
                    'age' => $this->getAge($model->date_of_birth),
        ]);
    }

    /**
     * Creates a new Resume model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate() {
        
        $model = new ResumeForm(Yii::$app->user->identity);
        
        if ($this->request->isPost && $model->load(Yii::$app->request->post())) {
            
            if ($model->save()) {
                
                Yii::$app->session->setFlash('success', 'Resume created!');
                return $this->redirect(['/resume/default']);
            }
        } 

        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing Resume model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {

        $model = $this->findModel($id);

        if (!\Yii::$app->user->can('updateResume', ['model' => $model])) {
            throw new ForbiddenHttpException('Access denied');
        }
        
       $dataproviderEducation = new ActiveDataProvider([
            'query' => ResumeEducation::find()->andFilterWhere(['resume_id' => $id]),
            ]);

        $dataproviderExperience = new ActiveDataProvider([
            'query' => ResumeExperience::find()->andFilterWhere(['resume_id' => $id]),
            ]);

        
        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }


        return $this->render('update', [
                    'model' => $model,
                    'modelEducation' => new ResumeEducation(),
                    'modelExperience' => new ResumeExperience(),
                    'dataproviderEducation' => $dataproviderEducation,
                    'dataproviderExperience' => $dataproviderExperience,

        ]);
    }

    /**
     * Deletes an existing Resume model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Resume model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Resume the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Resume::findOne(['id' => $id])) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
    
   
    public function getAge($date_of_birth) {
        return floor((time() - $date_of_birth)/31556926);        
    }
}
