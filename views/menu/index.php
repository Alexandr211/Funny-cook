<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MenuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Menus';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
    
    <p>
        <!--= Html::a('Create Menu', ['create'], ['class' => 'btn btn-success']) ?> -->
    </p>

  
   
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
         //   'id_dishes',
            'dish',
            'ingredient1',
            'ingredient2',
            'ingredient3',
            'ingredient4',
            'ingredient5',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
