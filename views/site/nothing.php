<?php
use yii\widgets\LinkPager;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$this->title = "Поиск";

?>

   <div>
     <?= Html::a('New Search', ['/site/search'], ['class'=>'btn btn-primary']) ?>   
    </div>
   
   <h2>Извините, но ничего не найдено!</h2>