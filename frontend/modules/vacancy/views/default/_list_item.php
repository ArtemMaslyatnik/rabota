<?php

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;


/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\vacancy\models\VacancySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>

<div class="post">
   
</div>
<div class="vacancy-list_item">
    <div class="row g-5">
    <div class="col-md-8">
      <h3 class="pb-4 mb-4 fst-italic border-bottom">
        Vacancy
      </h3>

      <article class="blog-post">
        <h2 class="blog-post-title"> <?= HtmlPurifier::process($model->profession->name) ?></h2>
        <h3 class="blog-post-title"> <?= HtmlPurifier::process($model->payment) ?></h3>
        <p>
            <?= HtmlPurifier::process($model->company) ?> 
            <?= HtmlPurifier::process($model->city->name) ?> 
        </p>
         <p>
            <?= HtmlPurifier::process($model->employment_id) ?> 
            <?= HtmlPurifier::process($model->education_id) ?> 
        </p>
        <p>
            <?= HtmlPurifier::process(mb_strimwidth($model->vacancy_description,0, 150, "...")) ?>             
        </p>
        <p>
            <?= HtmlPurifier::process(Yii::$app->formatter->asDatetime($model->vacancy_created_at)) ?>             
        </p>

        <p class="blog-post-meta">January 1, 2021 by <a href="#">Mark</a></p>
company

      </article>


    </div>


  

</div>
