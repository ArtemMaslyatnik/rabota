<?php

use yii\helpers\Html;
use yii\widgets\Pjax;


?> 
    
<div class="col-sm-12 col-md-6">
    <?php Pjax::begin(); ?>
    <?= Html::a("Новый случайный ключ", ['test11/multiple1'], ['class' => 'btn btn-lg btn-primary']) ?>
    <h3><?= $randomKey ?><h3>
    <?php Pjax::end(); ?>
</div>    



