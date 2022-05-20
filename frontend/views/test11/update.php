<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Test11 */

$this->title = 'Update Test 11: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Test 11s', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="test11-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
