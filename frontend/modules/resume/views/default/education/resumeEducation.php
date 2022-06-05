<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\web\JqueryAsset;
?>

<div>    
<?=
$this->render('resumeEducationView', [
    'dataproviderEducation' => $dataproviderEducation,
    'view' => '_list_item_Education'
])
?>
</div>

<?php $form = ActiveForm::begin(['options' => ['id' => 'form-add-education', 'class' => 'form-add-education']]) ?>

<?= Html::activeHiddenInput($modelEducation, 'resume_id', $options = ['value' => $model->id]) ?>
<?= Html::activeHiddenInput($modelEducation, 'id', $options = ['value' => $modelEducation->id]) ?>


<?php
echo $form->field($modelEducation, 'city_id')->widget(Select2::classname(), [
    'data' => $modelEducation->getCityList(),
    'language' => 'en',
    'options' => ['placeholder' => 'Select a City ...'],
    'pluginOptions' => [
        'allowClear' => true
    ],])->label('City');
?>

<div class="row">  
    <div class="col-sm-6">
        <?= $form->field($modelEducation, 'educational_institution')->textInput(['maxlength' => true, 'value' => '']) ?>
    </div>
    <div class="col-sm-6">
        <?= $form->field($modelEducation, 'faculty_specialty')->textInput(['maxlength' => true, 'value' => '']) ?>
    </div>
</div>
        <?= $form->field($modelEducation, 'education_details')->textarea(['value' => '']) ?>

<div class="row">  
    <div class="col-sm-6">
        <?=
        $form->field($modelEducation, 'date_from')->widget(\yii\jui\DatePicker::className(), [
            'language' => 'en',
            'dateFormat' => 'dd.MM.yyyy',
            'options' => [
                'placeholder' => Yii::$app->formatter->asDate('now', 'dd.MM.yyyy'),
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
    <div class="col-sm-6">
        <?=
        $form->field($modelEducation, 'date_by')->widget(\yii\jui\DatePicker::className(), [
            'language' => 'en',
            // 'dateFormat' => 'dd.MM.yyyy',
            'options' => [
                'placeholder' => Yii::$app->formatter->asDate('now', 'dd.MM.yyyy'),
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



<div class="form-group">
    <?= Html::button('Add', ['id' => 'button-add-education', 'name' => 'add-education', 'class' => 'btn btn-success']) ?>
    <?= Html::button('Save', ['id' => 'button-update-education', 'name' => 'update-education', 'class' => 'btn btn-primary', 'value' => $model->id]) ?>
    <?= Html::button('Cancel', ['id' => 'button-cancel-education', 'name' => 'cancel-education', 'class' => 'btn btn-light']) ?>
 </div>

<?php ActiveForm::end() ?>

<div>
        <?= Html::button('+', ['id' => 'button-add-education-form', 'name' => 'add-education-form', 'class' => 'btn btn-primary']) ?>
</div>

<?php $this->registerJsFile('@web/js/resume.js', [
    'depends' => JqueryAsset::className(),
]);
