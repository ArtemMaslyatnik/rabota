<?php

namespace frontend\modules\resume\controllers;

use Yii;
use yii\web\NotFoundHttpException;
use frontend\modules\resume\models\ResumeEducation;
use yii\web\Controller;
use yii\filters\VerbFilter;


/**
 * DefaultController implements the CRUD actions for Resume model.
 */
class ResumeEducationController extends Controller {
    
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

    //образование
    public function actionCreate() {
        Yii::$app->response->format = yii\web\Response::FORMAT_JSON;

        $model = new ResumeEducation();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                $json = $this->getArrEducation($model);
                return $json;
            }
        }
    }

    public function actionDelete() {
        Yii::$app->response->format = yii\web\Response::FORMAT_JSON;
        
        $id = (int)Yii::$app->request->post('id');
        if(Yii::$app->request->isAjax){
            $model = ResumeEducation::findOne(['id' => $id]);
            if ($model !== null) {
                $model->delete();
                return $json = $id;
            } else {
                return $json = "error";
            }
        }
    }
    
    public function actionUpdate($id) {
        Yii::$app->response->format = yii\web\Response::FORMAT_JSON;
        
        if(Yii::$app->request->isAjax){
            $model = ResumeEducation::findOne(['id' => $id]);

            if ($this->request->isPost && $model->load($this->request->post()) ) {
                $model->save();
             }
         
            $json = $this->getArrEducation($model);
            return $json;
        }
    }
    
        /**
     * Finds the ResumeEducation model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Resume the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = ResumeEducation::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    
    //общие
    private function getArrEducation ($model) {
       return array(
                    'resume_id' => $model->resume_id,
                    'id' => $model->id,
                    'educational_institution' => $model->educational_institution,
                    'faculty_specialty' => $model->faculty_specialty,
                    'city' => $model->city->name,
                    'city_id' => $model->city_id,
                    'education_details' => $model->education_details,
                    'date_from' => date('d.m.Y', $model->date_from),
                    'date_by' => date('d.m.Y', $model->date_by),
                );
    }
      
}