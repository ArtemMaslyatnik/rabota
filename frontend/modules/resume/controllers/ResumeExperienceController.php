<?php

namespace frontend\modules\resume\controllers;

use Yii;
use frontend\modules\resume\models\ResumeExperience;
use yii\web\Controller;
use yii\filters\VerbFilter;

/**
 * DefaultController implements the CRUD actions for Resume model.
 */
class ResumeExperienceController extends Controller {

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

    //опыт
    public function actionCreate() {
        Yii::$app->response->format = Yii\web\Response::FORMAT_JSON;

        $model = new ResumeExperience();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                $json = $this->getArrExperience($model);
                return $json;
            }
        }
    }

    public function actionDelete() {
        Yii::$app->response->format = Yii\web\Response::FORMAT_JSON;

        $id = (int)Yii::$app->request->post('id');
        if (Yii::$app->request->isAjax) {
            $model = ResumeExperience::findOne(['id' => $id]);
            if ($model !== null) {
                $model->delete();
                return $json = $id;
            } else {
                return $json = "error";
            }
        }
    }

    public function actionUpdate($id) {
        Yii::$app->response->format = Yii\web\Response::FORMAT_JSON;

        if (Yii::$app->request->isAjax) {
            $model = ResumeExperience::findOne(['id' => $id]);

            if ($this->request->isPost && $model->load($this->request->post())) {
                $model->save();
            }

            $json = $this->getArrExperience($model);
            return $json;
        }
    }

    private function getArrExperience($model) {
        return array(
            'resume_id' => $model->resume_id,
            'id' => $model->id,
            'company' => $model->company,
            'profession' => $model->profession->name,
            'profession_id' => $model->profession_id,
            'activity_company' => $model->activity_company,
            'city' => $model->city->name,
            'city_id' => $model->city_id,
            'responsibilities' => $model->responsibilities,
            'date_from' => date('d.m.Y', $model->date_from),
            'date_by' => date('d.m.Y', $model->date_by),
        );
    }

}
