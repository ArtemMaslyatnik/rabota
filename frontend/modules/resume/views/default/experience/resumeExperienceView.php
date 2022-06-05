<?php

use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $model frontend\modules\models\Resume */
/* @var $model frontend\modules\models\ResumeEducation */
?>

<div class="resume-resumeexperience-view">

    <?= ListView::widget([
            'dataProvider' => $dataproviderExperience,
            'itemOptions' => ['class' => 'item'],
            'summary' => false,
            'itemView' => $view,            
        ]); 
    ?>
</div>
