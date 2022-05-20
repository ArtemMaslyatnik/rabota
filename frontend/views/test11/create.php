<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Test11 */

$this->title = 'Create Test 11';
$this->params['breadcrumbs'][] = ['label' => 'Test 11s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="test11-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
