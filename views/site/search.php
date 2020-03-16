<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */

$this->title = 'Поиск в меню';
?>

     <div>
    <?php $form = ActiveForm::begin();
          // get all info from status table
    $ingredients = app\models\Ingredients::find()->all();
    // use map ArrayHelper
    $ingredient = ArrayHelper::map($ingredients,'id','ingredient');
         ?>
      <h2>Пожалуйста выберите не менее 2-х ингредиентов</h2>
      <div class="row">
      <div class="col-xs-5">
      <?= $form->field($items, 'ingredient1')->dropDownList($ingredient)->label('Ингредиент1') ?>
      </div>
      <div class="col-xs-5">
      <?= $form->field($items, 'ingredient2')->dropDownList($ingredient)->label('Ингредиент2') ?>
      </div>
      <div class="col-xs-5">
      <?= $form->field($items, 'ingredient3')->dropDownList($ingredient)->label('Ингредиент3') ?>
      </div>
      <div class="col-xs-5">
      <?= $form->field($items, 'ingredient4')->dropDownList($ingredient)->label('Ингредиент4') ?>
      </div>
      <div class="col-xs-5">
      <?= $form->field($items, 'ingredient5')->dropDownList($ingredient)->label('Ингредиент5') ?>
      </div>
      <div class="form-group">
        <div class = "col-xs-11" align="left">
            <?= Html::submitButton('Найти блюдо', ['class' => 'btn btn-primary']) ?>
        </div>
      </div>
      <?php ActiveForm::end(); ?>
    </div>

      </div>

     

 
      