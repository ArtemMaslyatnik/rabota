<?php

use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $model frontend\modules\models\Resume */
/* @var $model frontend\modules\models\ResumeEducation */
?>

<div class="resume-resumeexperience-view">

    <?= ListView::widget([
            'dataProvider' => $dataproviderExperience,
            'itemOptions' => ['class' => 'item', 'id' => 'item-resume-experience'],
            'summary' =>false,
            'itemView' => '_list_item_Experience',            
        ]); 
    ?>
</div>
