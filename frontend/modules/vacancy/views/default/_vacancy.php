<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Url;
?>

<div class="vacancy"  >
    <h2><?php  Html::encode($model->id) ?></h2>
    
      <article class="vacancy-list-vacancy">
        <h2 class="blog-post-title"><?= Html::a(Html::encode($model->profession->name), ['view', 'id' => $model->id]); ?></h2>
        <h4><?= $model->payment == "" ?  '' : HtmlPurifier::process($model->payment).' rub'?> </h4>
        
        <blockquote class="blockquote">
          <p>
             <?= HtmlPurifier::process($model->company)?>, 
             <?= HtmlPurifier::process($model->city->name)?>
          </p>
        </blockquote>
       

        <p>
            <?= HtmlPurifier::process($model->employment->name) ?>
            <?= $model->practice == "" ? ' without experience' : ' practice ' . HtmlPurifier::process($model->practice) . ' year' ?>
        </p>
        <p>
            <?= mb_strimwidth(HtmlPurifier::process($model->vacancy_description), 0, 150, Html::a('. . .>', ['view', 'id' => $model->id])) ?>
        </p>
        <p class="blog-post-meta"><?= HtmlPurifier::process(Yii::$app->formatter->asDate($model->vacancy_created_at)) ?> </p>
      </article>

</div>

