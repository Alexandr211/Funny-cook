<?php
use yii\widgets\LinkPager;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$this->title = "Поиск";

?>

   <div>
     <?= Html::a('New Search', ['/site/search'], ['class'=>'btn btn-primary']) ?>   
    </div>
   
   <h2>Пожалуйста, выберите не менее 2-х ингредиентов!</h2>
   