<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
//use app\models\Dishes;
/* @var $driver app\models\Driver */
?>

     <div>
    <?php $form = ActiveForm::begin();
          // get all info from status table
    $ingredients = app\models\Ingredients::find()->all();
    // use map ArrayHelper
    $ingredient = ArrayHelper::map($ingredients,'id','ingredient');
         ?>
      <h2>Please select at least 2 Ingredients</h2>   
      <div class="row">
      <div class="col-xs-5">
      <?= $form->field($items, 'ingredient1')->dropDownList($ingredient)->label('Ingredient1') ?>
      </div>
      <div class="col-xs-5">
      <?= $form->field($items, 'ingredient2')->dropDownList($ingredient)->label('Ingredient2') ?>
      </div>
      <div class="col-xs-5">
      <?= $form->field($items, 'ingredient3')->dropDownList($ingredient)->label('Ingredient3') ?>
      </div>
      <div class="col-xs-5">
      <?= $form->field($items, 'ingredient4')->dropDownList($ingredient)->label('Ingredient4') ?>
      </div>
      <div class="col-xs-5">
      <?= $form->field($items, 'ingredient5')->dropDownList($ingredient)->label('Ingredient5') ?>
      </div>
      <div class="form-group">
        <div class = "col-xs-11" align="left">
            <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        </div>
      </div>
      <?php ActiveForm::end(); ?>
    </div>

      </div>

     

 
      