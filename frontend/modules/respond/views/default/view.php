<?php


use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\UploadedFile;


/* @var $this yii\web\View */
/* @var $model frontend\modules\vacancy\models\Vacancy */

$this->title = 'Respond to Vacancy: ' . $modelVacancy->profession->name;

?>
<div class="vacancy-respond">
    
    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <?= $form->field($model, 'name')->textInput(); ?>
    <?= $form->field($model, 'name')->textInput(); ?>
    <?= $form->field($model, 'phone')->textInput(); ?>
    <?= $form->field($model, 'email')->textInput() ?>
    <?= $form->field($model, 'transmittalletter')->textarea(['rows' => '5']) ?>
    <?= $form->field($model, 'fileresume')->fileInput()->label('resume') ?>
                              
    <div class="form-group">
        <?= Html::submitButton('send', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

