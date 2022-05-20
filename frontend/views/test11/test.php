<?php

use yii\helpers\Html;
use yii\widgets\Pjax;


?> 
  
<div class="col-sm-12 col-md-6">
    <?php Pjax::begin(); ?>
    <?= Html::a("Новая случайная строка", ['test11/multiple'], ['class' => 'btn btn-lg btn-primary']) ?>
    <h3><?= $randomString ?></h3>
    <?php Pjax::end(); ?>
</div>


