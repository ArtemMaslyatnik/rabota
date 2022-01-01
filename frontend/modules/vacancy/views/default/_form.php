<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\vacancy\models\Vacancy */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vacancy-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'profession_id')->textInput() ?>

    <?= $form->field($model, 'company')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'city_id')->textInput() ?>

    <?= $form->field($model, 'employment_id')->textInput() ?>

    <?= $form->field($model, 'education_id')->textInput() ?>

    <?= $form->field($model, 'practice')->textInput() ?>

    <?= $form->field($model, 'payment')->textInput() ?>

    <?= $form->field($model, 'vacancy_description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'vacancy_created_at')->textInput() ?>

    <?= $form->field($model, 'category_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
