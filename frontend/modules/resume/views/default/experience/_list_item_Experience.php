<?php
// _list_item.php
use yii\helpers\Html;
?>

<article class="item" data-key="<?= $model->resume_id; ?>">
   
    <div class="row">
        <div class="col-lg-4">
            <?= 'Company: '. Html::encode($model->company).'<br>'; ?>
            <?= 'Activity company: '. Html::encode($model->activity_company).'<br>'; ?>
            <?= 'Profession: '. Html::encode($model->profession->name); ?>
        </div>
        <div class="col-lg-4">
            <?= 'City: '. Html::encode($model->city->name).'<br>'; ?>
            <?= 'responsibilities: '. Html::encode($model->responsibilities); ?>
        </div>
        <div class="col-lg-4">
            <?= 'Date from: '. Html::encode(\Yii::$app->formatter->asDate($model->date_from)).'<br>'; ?>
            <?= 'Date by: '. Html::encode(\Yii::$app->formatter->asDate($model->date_by)).'<br>'; ?>
        </div>
    </div>  
</article>
<br>
<hr>
