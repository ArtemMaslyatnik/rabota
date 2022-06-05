<?php

use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $model frontend\modules\models\Resume */
/* @var $model frontend\modules\models\ResumeEducation */
?>

<div class="resume-resumeeducation-view">

    <?= ListView::widget([
            'dataProvider' => $dataproviderEducation,
            'itemOptions' => ['class' => 'item'],
            'summary' =>false,
            'itemView' => $view,            
        ]); 
    ?>
</div>
