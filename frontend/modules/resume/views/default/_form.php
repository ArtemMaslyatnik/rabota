<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;


/* @var $this yii\web\View */
/* @var $model frontend\modules\models\Resume */
/* @var $form yii\widgets\ActiveForm */
/* @var $model frontend\modules\models\ResumeEducation */
/* @var $model frontend\modules\models\ResumeExperience */

?>

<div class="resume-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'salary')->textInput() ?>
    <hr class="separator">
    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>
        </div> 
        <div class="col-lg-6">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'patronymic')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-6">
            <?=
            $form->field($model, 'date_of_birth')->widget(\yii\jui\DatePicker::className(), [
                'language' => 'en',
                // 'dateFormat' => 'dd.MM.yyyy',
                'options' => [
                    'placeholder' => Yii::$app->formatter->asDate('now', 'dd.MM.yyyy'),//$model->date_of_birth),
                    'class' => 'form-control',
                    'autocomplete' => 'off'
                ],
                'clientOptions' => [
                    'changeMonth' => true,
                    'changeYear' => true,
                    'yearRange' => '1960:2050',
                //'showOn' => 'button',
                //'buttonText' => 'Выбрать дату',
                //'buttonImageOnly' => true,
                //'buttonImage' => 'images/calendar.gif'
                ]
            ])
            ?>
        </div>
    </div>
    <hr class="separator">
    <div class="row">
        <div class="col-lg-4">
            <?php
            echo $form->field($model, 'city_id')->widget(Select2::classname(), [
                'data' => $model->getCityList(),
                'language' => 'en',
                'options' => ['placeholder' => 'Select a City ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],])->label('City');
            ?>

        </div>
        <div class="col-lg-4">
            <?php
            echo $form->field($model, 'profession_id')->widget(Select2::classname(), [
                'data' => $model->getProfessionList(),
                'language' => 'en',
                'options' => ['placeholder' => 'Select a Profession ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],])->label('Profession');
            ?>
        </div>
        <div class="col-lg-4">

            <?php echo $form->field($model, 'employment_id')->dropDownList($model->getEmploymentList())->label('Employment'); ?>

        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
        </div> 
        <div class="col-lg-6">
            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>



    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>


    <?php ActiveForm::end(); ?>

</div>
