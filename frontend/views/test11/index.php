<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\widgets\ListView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\Test11Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Test 11s';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="test11-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Test 11', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'itemView' => function ($model, $key, $index, $widget) {
            return Html::a(Html::encode($model->name), ['view', 'id' => $model->id]);
        },
    ]) ?>
    
    
    <?php Pjax::end(); ?>

    <div class="col-sm-12 col-md-6">
    <?php Pjax::begin(); ?>
    <?= Html::a("Новая случайная строка", ['test11/multiple'], ['class' => 'btn btn-lg btn-primary']) ?>
    <h3><?= $randomString ?></h3>
    <?php Pjax::end(); ?>
</div>
    
    <div class="col-sm-12 col-md-6">
    <?php Pjax::begin(); ?>
    <?= Html::a("Новый случайный ключ", ['test11/multiple'], ['class' => 'btn btn-lg btn-primary']) ?>
    <h3><?= $randomKey ?><h3>
    <?php Pjax::end(); ?>
</div>   
    
</div>
