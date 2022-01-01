<?php

namespace frontend\controllers;


use yii\web\Controller;
use frontend\models\Category;
use yii\data\ActiveDataProvider;
/**
 * Site controller
 */
class SiteController extends Controller
{

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
    
     /**
     * Lists all Vacancy models by category.
     * @return mixed
     */
    public function actionListVacancyByCategory()
    {
//        $dataProvider = new ActiveDataProvider([
//           'query' => Category::find(),
//         
//      ]);
        
        $arrayCategory = Category::find()->asArray()->all();
        $countRecords = Category::find()->count();
        //dividing array in to two array
        $col1 = array_slice($arrayCategory, 0, $countRecords/2 + 0.5);
        $col2 = array_slice($arrayCategory, $countRecords/2 + 0.5, $countRecords);


        return $this->render('listVacancyByCategory', [
            'col1' => $col1,
            'col2' => $col2 
            ]);
    }
}
