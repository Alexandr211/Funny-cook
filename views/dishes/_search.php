<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DishesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dishes-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'dish') ?>

    <?= $form->field($model, 'ingredient1') ?>
    
    <?= $form->field($model, 'ingredient1_name') ?>

    <?= $form->field($model, 'ingredient2') ?>

    <?= $form->field($model, 'ingredient3') ?>

    <?php // echo $form->field($model, 'ingredient4') ?>

    <?php // echo $form->field($model, 'ingredient5') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
