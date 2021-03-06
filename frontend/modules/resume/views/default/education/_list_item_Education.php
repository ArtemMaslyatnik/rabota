<?php
// _list_item.php
use yii\helpers\Html;
?>

<article class="item" data-key="<?= $model->id; ?>">
   
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
            <?= Html::button('delete', [
                'id' => 'button-delete-education'.$model->id, 
                'name' => 'delete-education', 
                'class' => 'btn btn-danger', 
                'value' => $model->id,
                ],); ?>
            <?= Html::button('update', [
                'id' => 'button-update-education'.$model->id, 
                'name' => 'update-education', 
                'class' => 'btn btn-primary', 
                'value' => $model->id,
                ])?>
        </div>
    </div>  
</article>
<br>
<hr>
