<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h2>Hello! </h2>

    <p>
        <br>
        This is an example of food service which helps to find  the Dishes from Menu according Ingredients selected by the user.<br><br>
        The logic of the app is:<br>
        1. Admin section consists of <br>
        1.1. CRUD for Ingredients.<br>
        1.2. CRUD for Dishes which consist of ingredients.<br><br>
        
        Admin can hide one of the ingredients, in this case the dish containing this ingredient will also be hidden.<br><br>
        
        2. User section.<br>
        
        User can select up to 5 Ingredients to find the appropriate Dishes.<br>
        2.1. If dishes with complete matching of ingredients are found, only they will be shown.<br>
        2.2. If dishes with a partial match of ingredients are found, they will be displayed in order of decreasing the match of ingredients up to 2x.<br>
        2.3. If dishes with a match of less than 2 ingredients are found or they are not found, “Nothing found” will be displayed.<br>
        2.4. If less than 2 ingredients are selected a message: “Choose more ingredients” will be displayed.<br><br>
        
        Please mail me for any reason: alexandr211@yandex.ru<br>
        <br>
        Sincerely,<br>
        Alexander Bashtanov
        
        
        
        
        
        
          
    </p>

    
</div>
