<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\web\JqueryAsset;
?>

<div>    
<?=
$this->render('resumeExperienceView', [
    'dataproviderExperience' => $dataproviderExperience,
    'view' => '_list_item_Experience',
])
?>
</div>


    <?php $form = ActiveForm::begin(['options' => ['id' => 'form-add-experience', 'class' => 'form-add-experience']]) ?>

<?= Html::activeHiddenInput($modelExperience, 'resume_id', $options = ['value' => $model->id]) ?>
<?= Html::activeHiddenInput($modelExperience, 'id', $options = ['value' => $modelExperience->id]) ?>

<?php
    echo $form->field($modelExperience, 'city_id')->widget(Select2::classname(), [
    'data' => $modelExperience->getCityList(),
    'language' => 'en',
    'options' => ['placeholder' => 'Select a City ...'],
    'pluginOptions' => [
        'allowClear' => true
    ],])->label('City');
?>

<?php
    echo $form->field($modelExperience, 'profession_id')->widget(Select2::classname(), [
    'data' => $modelExperience->getProfessionList(),
    'language' => 'en',
    'options' => ['placeholder' => 'Select a Profession ...'],
    'pluginOptions' => [
        'allowClear' => true
    ],])->label('Profession');
?>


<div class="row">  
    <div class="col-sm-6">
        <?= $form->field($modelExperience, 'company')->textInput(['maxlength' => true, 'value' => '']) ?>
    </div>
    <div class="col-sm-6">
        <?= $form->field($modelExperience, 'activity_company')->textInput(['maxlength' => true, 'value' => '']) ?>
    </div>
</div>
        <?= $form->field($modelExperience, 'responsibilities')->textarea(['value' => '']) ?>

<div class="row">  
    <div class="col-sm-6">
        <?=
        $form->field($modelExperience, 'date_from')->widget(\yii\jui\DatePicker::className(), [
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
        $form->field($modelExperience, 'date_by')->widget(\yii\jui\DatePicker::className(), [
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
    <?= Html::button('Add', ['id' => 'button-add-experience', 'name' => 'add-experience', 'class' => 'btn btn-success']) ?>
    <?= Html::button('Save', ['id' => 'button-update-experience', 'name' => 'update-experience', 'class' => 'btn btn-primary', 'value' => $model->id]) ?>
    <?= Html::button('Cancel', ['id' => 'button-cancel-experience', 'name' => 'cancel-experience', 'class' => 'btn btn-light']) ?>
</div>


<?php ActiveForm::end() ?>

<div>
        <?= Html::button('+', ['id' => 'button-add-experience-form', 'name' => 'add-experience-form', 'class' => 'btn btn-primary']) ?>
</div>


<?php $this->registerJsFile('@web/js/resume.js', [
    'depends' => JqueryAsset::className(),
]);