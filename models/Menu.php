<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "menu".
 *
 * @property int $id
 * @property int $id_dishes
 * @property string $name
 * @property int $ingredient1
 * @property int $ingredient2
 * @property int $ingredient3
 * @property int $ingredient4
 * @property int $ingredient5
 *
 * @property Dishes $ingredient10
 * @property Dishes $ingredient20
 * @property Dishes $ingredient30
 * @property Dishes $ingredient40
 * @property Dishes $ingredient50
 * @property Dishes $dishes
 */
class Menu extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'menu';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ingredient1', 'ingredient2', 'ingredient3', 'ingredient4', 'ingredient5'], 'required'],
            [['id_dishes', 'ingredient1', 'ingredient2', 'ingredient3', 'ingredient4', 'ingredient5'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['ingredient1'], 'exist', 'skipOnError' => true, 'targetClass' => Dishes::className(), 'targetAttribute' => ['ingredient1' => 'id']],
            [['ingredient2'], 'exist', 'skipOnError' => true, 'targetClass' => Dishes::className(), 'targetAttribute' => ['ingredient2' => 'id']],
            [['ingredient3'], 'exist', 'skipOnError' => true, 'targetClass' => Dishes::className(), 'targetAttribute' => ['ingredient3' => 'id']],
            [['ingredient4'], 'exist', 'skipOnError' => true, 'targetClass' => Dishes::className(), 'targetAttribute' => ['ingredient4' => 'id']],
            [['ingredient5'], 'exist', 'skipOnError' => true, 'targetClass' => Dishes::className(), 'targetAttribute' => ['ingredient5' => 'id']],
            [['id_dishes'], 'exist', 'skipOnError' => true, 'targetClass' => Dishes::className(), 'targetAttribute' => ['id_dishes' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
        //    'id_dishes' => 'Id Dishes',
            'name' => 'Name',
            'ingredient1' => 'Ingredient1',
            'ingredient2' => 'Ingredient2',
            'ingredient3' => 'Ingredient3',
            'ingredient4' => 'Ingredient4',
            'ingredient5' => 'Ingredient5',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIngredient10()
    {
        return $this->hasOne(Dishes::className(), ['id' => 'ingredient1']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIngredient20()
    {
        return $this->hasOne(Dishes::className(), ['id' => 'ingredient2']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIngredient30()
    {
        return $this->hasOne(Dishes::className(), ['id' => 'ingredient3']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIngredient40()
    {
        return $this->hasOne(Dishes::className(), ['id' => 'ingredient4']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIngredient50()
    {
        return $this->hasOne(Dishes::className(), ['id' => 'ingredient5']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDishes()
    {
        return $this->hasOne(Dishes::className(), ['id' => 'id_dishes']);
    }
}
