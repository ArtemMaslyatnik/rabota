<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Resume */

$this->title = 'Create Resume';
$info = 'Experience and education can be added in your account';
$this->params['breadcrumbs'][] = ['label' => 'Resumes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="resume-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <h5><?= Html::encode($info) ?></h5>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
