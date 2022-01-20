<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\vacancy\models\Vacancy */

$this->title = 'Respond to Vacancy: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Vacancies', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="vacancy-respond">

    <h1><?= Html::encode($this->title) ?></h1>

     <?php $form = ActiveForm::begin(); ?>
    
    <?=Html::input('name','name','name',['class'=>'form-control'])?>
    <?=Html::input('phone','phone','phone',['class'=>'form-control'])?>
    <?=Html::input('e-mail','e-mail','e-mail',['class'=>'form-control'])?>
    <?=Html::input('accompanying text','','',['class'=>'form-control'])?>



     
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
