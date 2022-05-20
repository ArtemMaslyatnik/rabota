<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
?>

<div id ="product_type">    
<?=
$this->render('resumeExperienceView', [
    'dataproviderExperience' => $dataproviderExperience,
])
?>
</div>


    <?php $form = ActiveForm::begin(['id' => 'form-add-experience']) ?>

<?= Html::activeHiddenInput($modelExperience, 'resume_id', $options = ['value' => $model->id]) ?>


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
    <?= Html::button('Add education', ['id' => 'button-add-experience', 'name' => 'add-experience', 'class' => 'btn btn-success']) ?>
</div>


<?php ActiveForm::end() ?>




<?php
$js = <<<JS
     
    $('#button-add-experience').on('click', function(event){
        event.preventDefault();
        var data = $('#form-add-experience').serialize();
         $.ajax({
            url: '/rabota/frontend/web/resume/default/add-experience',
            type: 'POST',
            data: data,
            dataType: 'json',
            beforeSend: function() {
			$('#button-add-experience').button('loading');
		},
            complete: function() {
			$('#button-add-experience').button('reset');
		},
            success: function(json){
                console.log(json['arrExperience']);
                $("#item-resume-experience").append(        
                    '<article class="item" data-key="' + json['arrExperience'].resume_id + '"> <div class="row"> ' 
                    + '<div class="col-lg-4"> Company: ' + json['arrExperience'].company 
                    + '<br> Activity company: '  +  json['arrExperience'].activity_company  
                    + '<br>  Profession: ' + json['arrExperience'].profession + '</div>' 
                    + '<div class="col-lg-4">  City: ' + json['arrExperience'].city  
                    + '<br> Education details: ' + json['arrExperience'].education_details + '</div>'
                    + '<div class="col-lg-4">  Date from: ' + json['arrExperience'].date_from  
                    + '<br> Date by: ' + json['arrExperience'].date_by + '</div></div></article><br><hr>'
                )
            },
            error: function(xhr, ajaxOptions, thrownError) {
			alert(thrownError  + xhr.statusText +  + xhr.responseText);
            },
            timeout: 100000
        });
    });
JS;

$this->registerJs($js);
?>
