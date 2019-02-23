<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MenuSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="menu-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_dishes') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'ingredient1') ?>

    <?= $form->field($model, 'ingredient2') ?>

    <?php // echo $form->field($model, 'ingredient3') ?>

    <?php // echo $form->field($model, 'ingredient4') ?>

    <?php // echo $form->field($model, 'ingredient5') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
