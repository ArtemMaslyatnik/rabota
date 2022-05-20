<?php

use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $model frontend\modules\models\Resume */
/* @var $model frontend\modules\models\ResumeEducation */
?>

<div class="resume-resumeeducation-view">

    <?= ListView::widget([
            'dataProvider' => $dataproviderEducation,
            'itemOptions' => ['class' => 'item', 'id' => 'item-resume-education'],
            'summary' =>false,
            'itemView' => '_list_item_Education',            
        ]); 
    ?>
</div>
