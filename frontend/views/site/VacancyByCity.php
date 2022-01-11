<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\vacancy\models\VacancySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vacancy by City';
?>
<div class="City-by-category-list">

    <h2 class="text-md-center"><?= Html::encode($this->title) ?></h2>
    <br>
    <br>
    <div class="row">
        <div class="col-md-2">

        </div>
        <div class="col-md-4">
            <?php foreach ($col1 as $col): ?>

                <div class="d-flex">
                    <ul class="list-inline mx-auto justify-content-center">
                        <li class="list-inline-item font-weight-bold"><a href="<?= Url::to(['/vacancy/default/list-vacancy-by-city',  'id' => $col['id']]); ?>"><?= $col['name']?></a></li>
                    </ul>
                </div>


            <?php endforeach; ?>
        </div>
        <div class="col-md-4">
            <?php foreach ($col2 as $col): ?>

                <div class="d-flex">
                    <ul class="list-inline mx-auto justify-content-center">
                        <li class="list-inline-item font-weight-bold"><a href="<?= Url::to(['/vacancy/default/list-vacancy-by-city',  'id' => $col['id']]); ?>"><?= $col['name']?></a></li>
                    </ul>
                </div>

            <?php endforeach; ?>
        </div>
        <div class="col-md-2">

        </div>
    </div>
</div>




