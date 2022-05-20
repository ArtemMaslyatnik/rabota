<?php

use yii\helpers\Html;
use yii\bootstrap4\Tabs;

/* @var $this yii\web\View */
/* @var $model app\models\Resume */

$this->title = 'Update Resume: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Resumes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';

\yii\web\YiiAsset::register($this);
?>
<div class="resume-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    
    

     <?php 
    echo  Tabs::widget([
           'items' => [
               [
                   'label'     =>  'Education',
                   'content'   =>  $this->render('education/resumeEducation', ['model' => $model, 'modelEducation' => $modelEducation, 'dataproviderEducation' => $dataproviderEducation,]),
                   'active'    =>  true
                ],
               [
                   'label'     =>  'Experience',
                   'content'   =>  $this->render('experience/resumeExperience', ['model' => $model, 'modelExperience' => $modelExperience, 'dataproviderExperience' => $dataproviderExperience,]),
                ],
                ]
        ]);
    ?>
    
        
</div>
