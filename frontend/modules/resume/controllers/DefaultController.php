<?php

namespace frontend\modules\resume\controllers;

use frontend\modules\resume\models\Resume;
use frontend\modules\resume\models\ResumeSearch;
use frontend\modules\resume\models\ResumeEducation;
use frontend\modules\resume\models\ResumeExperience;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;

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
                    'access' => [
                        'class' => AccessControl::class,
                        'rules' => [
                            [
                                'allow' => true,
                                'actions' => ['index', 'view'],
                                'roles' => ['admin', 'employer', 'applicant'],
                            ],
                            [
                                'allow' => true,
                                'actions' => ['create', 'update', 'delete'],
                                'roles' => ['admin', 'applicant'],
                            ],
                        ],
                    ],
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
        $dataproviderEducation = new ActiveDataProvider([
            'query' => ResumeEducation::find(['resume_id' => $id]),
        ]);

        $dataproviderExperience = new ActiveDataProvider([
            'query' => ResumeExperience::find(['resume_id' => $id]),
        ]);
        return $this->render('view', [
                    'model' => $this->findModel($id),
                    'dataproviderExperience' => $dataproviderExperience,
                    'dataproviderEducation' => $dataproviderEducation,
        ]);
    }

    /**
     * Creates a new Resume model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate() {
        //model checking!!!
        $modelEducation = new ResumeEducation();

        $model = new Resume();

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
                    'model' => $model,
                    'modelEducation' => $modelEducation,
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
            'query' => ResumeEducation::find(['resume_id' => $id]),
        ]);

        $dataproviderExperience = new ActiveDataProvider([
            'query' => ResumeExperience::find(['resume_id' => $id]),
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

    public function actionAddEducation() {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $model = new ResumeEducation();

        $json = array();
        $json['arrEducation'] = array();
        if ($model->load(\Yii::$app->request->post())) {
            if ($model->save()) {
                $json['arrEducation'] = array(
                    'resume_id' => $model->resume_id,
                    'educational_institution' => $model->educational_institution,
                    'faculty_specialty' => $model->faculty_specialty,
                    'city' => $model->city->name,
                    'education_details' => $model->education_details,
                    'date_from' => date('m.d.Y', $model->date_from),
                    'date_by' => date('m.d.Y', $model->date_by),
                );
                return $json;
            }
        }
    }

    public function actionAddExperience() {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $model = new ResumeExperience();

        $json = array();
        $json['arrExperience'] = array();
        if ($model->load(\Yii::$app->request->post())) {
            if ($model->save()) {
                $json['arrExperience'] = array(
                    'resume_id' => $model->resume_id,
                    'company' => $model->company,
                    'profession' => $model->profession->name,
                    'activity_company' => $model->activity_company,
                    'city' => $model->city->name,
                    'responsibilities' => $model->responsibilities,
                    'date_from' => date('m.d.Y', $model->date_from),
                    'date_by' => date('m.d.Y', $model->date_by),
                );
                return $json;
            }
        }
    }

    public function actionDeleteEducation() {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $model = ResumeExperience::findAll(['resume_id' => $id]);

//        $json = array();
//        $json['arrExperience'] = array();
//        if($model->load(\Yii::$app->request->post())){
//            if ($model->save()){
//                $json['arrExperience'] =  array(
//					'resume_id'        => $model->resume_id,
//					'company'          => $model->company,
//                                        'profession'       => $model->profession->name,
//					'activity_company' => $model->activity_company,
//					'city'          => $model->city->name,
//                    			'responsibilities' => $model->responsibilities,
//					'date_from'        => date('m.d.Y',$model->date_from),
//					'date_by'          => date('m.d.Y', $model->date_by),
//                    );
//                return $json;
//            }
//        }
    }

}
