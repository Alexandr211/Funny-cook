 <?php
use yii\widgets\LinkPager;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$this->title = "Поиск";

?>

   <div>
     <?= Html::a('Новый поиск', ['/site/search'], ['class'=>'btn btn-primary']) ?>
    </div>
   
   <h2>Результат поиска:</h2>
   
    <ul>
     <?php foreach ($items as $item): ?>
     
    <li>
        <?= $item ?>
    </li>
       
       <?php endforeach; ?>   
        
    </ul>  
    

    
    
    
     

    
   
   

