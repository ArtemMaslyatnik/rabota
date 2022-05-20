<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

use yii\bootstrap4\Tabs;

/* @var $this yii\web\View */
/* @var $model frontend\modules\models\Resume */
/* @var $dataproviderExperience yii\data\ActiveDataProvider */
/* @var $dataproviderEducation yii\data\ActiveDataProvider */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Resumes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="resume-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'surname',
            'name',
            'patronymic',
            'phone',
            'email:email',
            'date_of_birth:date',
            [
                'label' => 'City',
                'value' => $model->city->name,
            ],
            [
                'label' => 'Profession',
                'value' => $model->profession->name,
            ],
            [
                'label' => 'Employment',
                'value' => $model->employment->name,
            ],
            'salary',
            'address',
            'date_added:date',
        ],
    ]);
    ?>
    
         <?php 
    echo  Tabs::widget([
           'items' => [
               [
                   'label'     =>  'Education',
                   'content'   =>  $this->render('education/resumeEducationView', ['dataproviderEducation' => $dataproviderEducation,]),
                   'active'    =>  true
                ],
               [
                   'label'     =>  'Experience',
                   'content'   =>  $this->render('experience/resumeExperienceView', ['dataproviderExperience' => $dataproviderExperience,]),
                ],
                ]
        ]);
    ?>

    
</div>