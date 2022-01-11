<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model frontend\modules\vacancy\models\VacancySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vacancy-search">

    <?php
    $form = ActiveForm::begin([
                'action' => ['index'],
                'method' => 'get',
                'options' => [
                    'data-pjax' => 1
                ],
    ]);
    ?>

    <div class="row">
        <div class="col-md-5">
            <?=
            $form->field($model, 'profession_id')->widget(Select2::classname(), [
                'data' => $model->getProfessionList(),
                'language' => 'en',
                'options' => ['placeholder' => 'Select a Profession ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],])->label(false);
            ?>
        </div>
        <div class="col-md-5">
            <?=
            $form->field($model, 'city_id')->widget(Select2::classname(), [
                'data' => $model->getCityList(),
                'language' => 'en',
                'options' => ['placeholder' => 'Select a City ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],])->label(false);
            ?>
        </div>
        <?php // echo $form->field($model, 'employment_id')->dropDownList($model->getEmploymentList(), ['prompt' => 'Select a Employment ...'])->label('Employment');  ?>

        <div class="col-md-2">
                <?= Html::submitButton('Search', ['class' => 'btn btn-primary ']) ?>
                <?php // Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>

        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
