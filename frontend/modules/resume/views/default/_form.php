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

    
    
    <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'patronymic')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_of_birth')->widget(\yii\jui\DatePicker::className(), [
        'language' => 'en',
       // 'dateFormat' => 'dd.MM.yyyy',
        'options' => [
            'placeholder' => Yii::$app->formatter->asDate($model->date_of_birth),
            'class'=> 'form-control',
            'autocomplete'=>'off'
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
    ]) ?>

    <?php echo $form->field($model, 'city_id')->widget(Select2::classname(), [
                'data' => $model->getCityList(),
                'language' => 'en',
                'options' => ['placeholder' => 'Select a City ...'],
                'pluginOptions' => [
                    'allowClear' => true
                    ],])->label('City');?>

    <?php echo $form->field($model, 'profession_id')->widget(Select2::classname(), [
                'data' => $model->getProfessionList(),
                'language' => 'en',
                'options' => ['placeholder' => 'Select a Profession ...'],
                'pluginOptions' => [
                    'allowClear' => true
                    ],])->label('Profession');?>

    <?php echo $form->field($model, 'employment_id')->dropDownList($model->getEmploymentList())->label('Employment'); ?>

    <?= $form->field($model, 'salary')->textInput() ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>
    
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
