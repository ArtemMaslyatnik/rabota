<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

?>
<div>          
    <?php
        foreach ($model->resumeexperience as $experience) {

                echo 'activity_company: ' . $experience->activity_company.'</br>';
                echo 'city: ' . $experience->city->name.'</br>';
                echo 'profession: ' . $experience->profession->name.'</br>';
                echo 'company' . $experience->company.'</br>';
                echo 'responsibilities' . $experience->responsibilities.'</br>';
                echo 'date_from' . $experience->date_from.'</br>';
                echo 'date_by' . $experience->date_by.'</br>';
        }
    ?>
    
</div>