<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\vacancy\models\VacancySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vacancies';
?>
<div class="vacancy-index">

    <h1><?= Html::encode($this->title) ?></h1>

<?php Pjax::begin(); ?>
        <div class="col-xs-4">
            <?php echo $this->render('_search', ['model' => $searchModel,]); ?>  
        </div>
    <div class="row">

    
        <div class="col-xs-8">
            <?=
            ListView::widget([
                'dataProvider' => $dataProvider,
                'itemOptions' => ['class' => 'item'],
                'itemView' => function ($model, $key, $index, $widget) {
                    
                    //return Html::a(Html::encode($model->id), ['view', 'id' => $model->id]);
                    return $this->render('_vacancy',['model' => $model]);
                },
            ])
            ?>
        </div>
    


    </div>
<?php Pjax::end(); ?>

</div>
