<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dishes".
 *
 * @property int $id
 * @property string $dish
 * @property int $ingredient1
 * @property int $ingredient2
 * @property int $ingredient3
 * @property int $ingredient4
 * @property int $ingredient5
 *
 * @property Ingredients $ingredient10
 * @property Ingredients $ingredient20
 * @property Ingredients $ingredient30
 * @property Ingredients $ingredient40
 * @property Ingredients $ingredient50
 */
class Dishes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dishes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dish', 'ingredient1', 'ingredient2', 'ingredient3', 'ingredient4', 'ingredient5'], 'required'],
            [['ingredient1', 'ingredient2', 'ingredient3', 'ingredient4', 'ingredient5'], 'integer'],
            [['dish', 'ingredient1_name', 'ingredient2_name', 'ingredient3_name', 'ingredient4_name', 'ingredient5_name'], 'string', 'max' => 255],
            [['ingredient1'], 'exist', 'skipOnError' => true, 'targetClass' => Ingredients::className(), 'targetAttribute' => ['ingredient1' => 'id']],
            [['ingredient2'], 'exist', 'skipOnError' => true, 'targetClass' => Ingredients::className(), 'targetAttribute' => ['ingredient2' => 'id']],
            [['ingredient3'], 'exist', 'skipOnError' => true, 'targetClass' => Ingredients::className(), 'targetAttribute' => ['ingredient3' => 'id']],
            [['ingredient4'], 'exist', 'skipOnError' => true, 'targetClass' => Ingredients::className(), 'targetAttribute' => ['ingredient4' => 'id']],
            [['ingredient5'], 'exist', 'skipOnError' => true, 'targetClass' => Ingredients::className(), 'targetAttribute' => ['ingredient5' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dish' => 'Блюдо',
            'ingredient1' => 'Ингредиент1',
            'ingredient1_name' => 'Ингредиент1',
            'ingredient2' => 'Ингредиент2',
            'ingredient2_name' => 'Ингредиент2',
            'ingredient3' => 'Ингредиент3',
            'ingredient3_name' => 'Ингредиент3',
            'ingredient4' => 'Ингредиент4',
            'ingredient4_name' => 'Ингредиент4',
            'ingredient5' => 'Ингредиент5',
            'ingredient5_name' => 'Ингредиент5'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    
    // Create aliases for ingredients, so relations will be picked in separate join clauses. And after use these aliases in the filter criteria with column names in models/DishesSearch.php.
    
    public function getIngredient10()
    {
        return $this->hasOne(Ingredients::className(), ['id' => 'ingredient1'])->from(['ingredient10' => Ingredients::tableName()]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIngredient20()
    {
        return $this->hasOne(Ingredients::className(), ['id' => 'ingredient2'])->from(['ingredient20' => Ingredients::tableName()]);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIngredient30()
    {
        return $this->hasOne(Ingredients::className(), ['id' => 'ingredient3'])->from(['ingredient30' => Ingredients::tableName()]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIngredient40()
    {
        return $this->hasOne(Ingredients::className(), ['id' => 'ingredient4'])->from(['ingredient40' => Ingredients::tableName()]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIngredient50()
    {
        return $this->hasOne(Ingredients::className(), ['id' => 'ingredient5'])->from(['ingredient50' => Ingredients::tableName()]);
    }
    
}
