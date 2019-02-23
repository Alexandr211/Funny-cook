 <?php
use yii\widgets\LinkPager;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$this->title = "Поиск";

?>

   <div>
     <?= Html::a('New Search', ['/site/search'], ['class'=>'btn btn-primary']) ?>   
    </div>
   
   <h2>The Dishes selected:</h2>
   
    <ul>
     <?php foreach ($items as $item): ?>
     
    <li>
        <?= $item->dish ?>
    </li>
       
       <?php endforeach; ?>   
        
    </ul>  
    
    <div><?php//= $items1; ?></div>
    
    
    
     

    
   
   

