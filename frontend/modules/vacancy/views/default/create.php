<?php
/* @var $this yii\web\View */
/* @var $model frontend\modules\post\models\forms\PostForm */

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use kartik\select2\Select2;


?>

<div class="post-default-index">
    
    <h1>Create vacancy</h1>

    <?php $form = ActiveForm::begin(); ?>
    
        <?php echo $form->field($model, 'profession_id')->widget(Select2::classname(), [
                'data' => $model->getProfessionList(),
                'language' => 'en',
                'options' => ['placeholder' => 'Select a Profession ...'],
                'pluginOptions' => [
                    'allowClear' => true
                    ],])->label('Profession');?>
        <?php echo $form->field($model, 'company')->textInput()->label('Company'); ?>
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
        
        <?php echo Html::submitButton('Create'); ?>
    
    <?php ActiveForm::end(); ?>
    
</div>