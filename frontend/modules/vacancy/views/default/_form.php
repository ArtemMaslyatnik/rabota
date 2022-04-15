<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model frontend\modules\vacancy\models\Vacancy */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vacancy-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($model, 'category_id')->widget(Select2::classname(), [
                'data' => $model->getСategoryList(),
                'language' => 'en',
                'options' => ['placeholder' => 'Select a Сategory ...'],
                'pluginOptions' => [
                    'allowClear' => true
                    ],])->label('Сategory');?>

    <?php echo $form->field($model, 'profession_id')->widget(Select2::classname(), [
                'data' => $model->getProfessionList(),
                'language' => 'en',
                'options' => ['placeholder' => 'Select a Profession ...'],
                'pluginOptions' => [
                    'allowClear' => true
                    ],])->label('Profession');?>

    <?= $form->field($model, 'company')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'city_id')->widget(Select2::classname(), [
                'data' => $model->getCityList(),
                'language' => 'en',
                'options' => ['placeholder' => 'Select a City ...'],
                'pluginOptions' => [
                    'allowClear' => true
                    ],])->label('City');?>

    <?php echo $form->field($model, 'employment_id')->dropDownList($model->getEmploymentList())->label('Employment'); ?>
    <?php echo $form->field($model, 'practice'); ?>
    <?php echo $form->field($model, 'education_id')->dropDownList($model->getEducationList())->label('Education'); ?>
    <?php echo $form->field($model, 'vacancy_description')->textarea(['rows' => '20'])->label('Description'); ?>
    <?php echo $form->field($model, 'payment'); ?>

     <?= $form->field($model, 'email')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
