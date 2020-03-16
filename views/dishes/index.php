<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DishesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Меню';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dishes-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать блюдо', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

        //    'id',
            'dish',            
        //    'ingredient1',
            [
                'attribute' => 'ingredient1_name',
                'filter' => \app\models\Ingredients::find()->select('ingredient'),                  
                'value' => function($model) {
                        return (\app\models\Ingredients::findOne(['id' => $model->ingredient1])->ingredient);
                },

                'format' => 'html',

                'headerOptions' => ['style' => 'width:15%'],

            ], 
         //   'ingredient2',
            [
                'attribute' => 'ingredient2_name',
                'filter' => \app\models\Ingredients::find()->select('ingredient'),                  
                'value' => function($model) {
                        return (\app\models\Ingredients::findOne(['id' => $model->ingredient2])->ingredient);
                },

                'format' => 'html',

                'headerOptions' => ['style' => 'width:15%'],

            ], 
       //     'ingredient3',
            [
                'attribute' => 'ingredient3_name',
                'filter' => \app\models\Ingredients::find()->select('ingredient'),                  
                'value' => function($model) {
                        return (\app\models\Ingredients::findOne(['id' => $model->ingredient3])->ingredient);
                },

                'format' => 'html',

                'headerOptions' => ['style' => 'width:15%'],

            ], 
       //     'ingredient4',
            [
                'attribute' => 'ingredient4_name',
                'filter' => \app\models\Ingredients::find()->select('ingredient'),                  
                'value' => function($model) {
                        return (\app\models\Ingredients::findOne(['id' => $model->ingredient4])->ingredient);
                },

                'format' => 'html',

                'headerOptions' => ['style' => 'width:15%'],

            ], 
       //     'ingredient5',
            [
                'attribute' => 'ingredient5_name',
                'filter' => \app\models\Ingredients::find()->select('ingredient'),                  
                'value' => function($model) {
                        return (\app\models\Ingredients::findOne(['id' => $model->ingredient5])->ingredient);
                },

                'format' => 'html',

                'headerOptions' => ['style' => 'width:15%'],

            ], 

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
