<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Vacancy */

//$this->title = $model->profession->name;
//$this->params['breadcrumbs'][] = ['label' => 'Vacancy', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
//\yii\web\YiiAsset::register($this);
?>
<div class="vacancy-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'label' => 'Profession',
                'value' => $model->profession->name,
            ],
            'company',
            [
                'label' => 'City',
                'value' => $model->city->name,
            ],
            [
                'label' => 'Employment',
                'value' => $model->employment->name,
            ],
            [
                'label' => 'Education',
                'value' => $model->education->name,
            ],
            'practice',
            'payment',
            'vacancy_description',
            'vacancy_created_at:date',
        ],
    ])
    ?>
<?php if (isset($currentUser->id) and $currentUser->id == $model->user_id): ?>

        <p>

            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?=
            Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ])
            ?>

        </p>
        <?php else: ?>
        <p>

            <?= Html::a('Respond', ['respond', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

        </p>
<?php endif ?>

</div>
