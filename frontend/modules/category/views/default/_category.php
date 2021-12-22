<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
?>

<div class="category"  >
    <h2><?php // Html::encode($model->id) ?></h2>

    <?= HtmlPurifier::process($model->name) ?>

    
   
</div>
