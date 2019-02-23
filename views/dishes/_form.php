<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Dishes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dishes-form">

    <?php $form = ActiveForm::begin(); 
    // get all info from status table
    $ingredients = app\models\Ingredients::find()->all();
    // use map ArrayHelper
    $items = ArrayHelper::map($ingredients,'id','ingredient');
    ?>

    <?= $form->field($model, 'dish')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ingredient1')->dropDownList($items) ?>

    <?= $form->field($model, 'ingredient2')->dropDownList($items) ?>

    <?= $form->field($model, 'ingredient3')->dropDownList($items) ?>

    <?= $form->field($model, 'ingredient4')->dropDownList($items) ?>

    <?= $form->field($model, 'ingredient5')->dropDownList($items) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
