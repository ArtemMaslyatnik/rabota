<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model frontend\modules\vacancy\models\VacancySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vacancy-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>


    <?= $form->field($model, 'profession_id')->widget(Select2::classname(), [
                'data' => $model->getProfessionList(),
                'language' => 'en',
                'options' => ['placeholder' => 'Select a Profession ...'],
                'pluginOptions' => [
                    'allowClear' => true
                    ],])->label('Profession');?>

   <?= $form->field($model, 'city_id')->widget(Select2::classname(), [
                'data' => $model->getCityList(),
                'language' => 'en',
                'options' => ['placeholder' => 'Select a City ...'],
                'pluginOptions' => [
                    'allowClear' => true
                    ],])->label('City');?>

    <?php  echo $form->field($model, 'employment_id')->dropDownList($model->getEmploymentList(), ['prompt' => 'Select a Employment ...'])->label('Employment'); ?>


    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
