<?php 
use yii\widgets\ListView;

?>

<div class="vacancy-default-index">

    
   
       <?php echo ListView::widget([
           'dataProvider' => $dataProvider,
           'itemView' => '_vacancy',
        ]);
       ?>
   

</div>


