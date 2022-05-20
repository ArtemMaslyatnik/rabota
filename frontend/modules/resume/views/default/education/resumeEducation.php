<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
?>

<div id ="product_type">    
<?=
$this->render('resumeEducationView', [
    'dataproviderEducation' => $dataproviderEducation,
])
?>
</div>

    <?php $form = ActiveForm::begin(['id' => 'form-add-education']) ?>

<?= Html::activeHiddenInput($modelEducation, 'resume_id', $options = ['value' => $model->id]) ?>


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
<?= Html::button('Add education', ['id' => 'button-add-education', 'name' => 'add-education', 'class' => 'btn btn-success']) ?>
</div>


<?php ActiveForm::end() ?>




<?php
$js = <<<JS
     
    $('#button-add-education').on('click', function(event){
        event.preventDefault();
        var data = $('#form-add-education').serialize();
         $.ajax({
            url: '/rabota/frontend/web/resume/default/add-education',
            type: 'POST',
            data: data,
            dataType: 'json',
            beforeSend: function() {
			$('#button-add-education').button('loading');
		},
            complete: function() {
			$('#button-add-education').button('reset');
		},
            success: function(json){
                console.log(json['arrEducation']);
                $("#item-resume-education").append(        
                    '<article class="item" data-key="' + json['arrEducation'].resume_id + '"> <div class="row"> ' +
                    '<div class="col-lg-4"> Educational institution: ' + json['arrEducation'].educational_institution+ 
                    '<br> Faculty specialty: '  +  json['arrEducation'].faculty_specialty  + '</div>' 
                    + '<div class="col-lg-4">  City: ' + json['arrEducation'].city  
                    + '<br> Education details: ' + json['arrEducation'].education_details + '</div>'
                    + '<div class="col-lg-4">  Date from: ' + json['arrEducation'].date_from  
                    + '<br> Date by: ' + json['arrEducation'].date_by + '</div></div></article><br><hr>'
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

<?php
$js1 = <<<JS
     
   $('#product_type').delegate('.btn-danger', 'click', function() {

        var node = this;
        var data = 'key=' + encodeURIComponent(this.value);
         $.ajax({
            url: '/rabota/frontend/web/resume/default/delete-education',
            type: 'POST',
            data: data,
            dataType: 'json',
            beforeSend: function() {
			$(node).button('loading');
		},
            complete: function() {
			$(node).button('reset');
		},
            success: function(json){
                console.log(json['arrEducation']);
                $("#item-resume-education").append(        
                    '<article class="item" data-key="' + json['arrEducation'].resume_id + '"> <div class="row"> ' +
                    '<div class="col-lg-4"> Educational institution: ' + json['arrEducation'].educational_institution+ 
                    '<br> Faculty specialty: '  +  json['arrEducation'].faculty_specialty  + '</div>' 
                    + '<div class="col-lg-4">  City: ' + json['arrEducation'].city  
                    + '<br> Education details: ' + json['arrEducation'].education_details + '</div>'
                    + '<div class="col-lg-4">  Date from: ' + json['arrEducation'].date_from  
                    + '<br> Date by: ' + json['arrEducation'].date_by + '</div></div></article><br><hr>'
                )
            },
            error: function(xhr, ajaxOptions, thrownError) {
			alert(thrownError  + xhr.statusText +  + xhr.responseText);
            },
            timeout: 100000
        });
    });
JS;


$this->registerJs($js1);
?>