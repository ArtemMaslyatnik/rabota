<?php
// _list_item.php
use yii\helpers\Html;
use yii\helpers\Url;
?>

<article class="item" data-key="<?= $model->resume_id; ?>">
   
    <div class="row">
        <div class="col-sm-4">
        <?= Html::hiddenInput('id', $model->id, $options = ['id' => $model->id]); ?>
        <?= 'Educational institution: '. Html::encode($model->educational_institution).'<br>'; ?>
        <?= 'Faculty specialty: '. Html::encode($model->faculty_specialty); ?>
        </div>
        <div class="col-sm-4">
        <?= 'City: '. Html::encode($model->city->name).'<br>'; ?>
        <?= 'Education details: '. Html::encode($model->education_details); ?>
        </div>
        <div class="col-sm-3">
        <?= 'Date from: '. Html::encode(\Yii::$app->formatter->asDate($model->date_from)).'<br>'; ?>
        <?= 'Date by: '. Html::encode(\Yii::$app->formatter->asDate($model->date_by)).'<br>'; ?>
        </div>
        <div class="col-sm-1">
            <?= Html::button('delete', ['id' => 'button-delete-education', 'name' => 'delete-education', 'class' => 'btn btn-danger', 'value' => '1']) ?>
        </div>
    </div>  
</article>
<br>
<hr>
