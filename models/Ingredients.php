<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ingredients".
 *
 * @property int $id
 * @property string $ingredient
 * @property int $visibility
 *
 * @property Dishes[] $dishes
 * @property Dishes[] $dishes0
 * @property Dishes[] $dishes1
 * @property Dishes[] $dishes2
 * @property Dishes[] $dishes3
 */
class Ingredients extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ingredients';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ingredient', 'visibility'], 'required'],
            [['visibility'], 'integer'],
            [['ingredient'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ingredient' => 'Ingredient',
            'visibility' => 'Visibility',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDishes()
    {
        return $this->hasMany(Dishes::className(), ['ingredient1' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDishes0()
    {
        return $this->hasMany(Dishes::className(), ['ingredient2' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDishes1()
    {
        return $this->hasMany(Dishes::className(), ['ingredient3' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDishes2()
    {
        return $this->hasMany(Dishes::className(), ['ingredient4' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDishes3()
    {
        return $this->hasMany(Dishes::className(), ['ingredient5' => 'id']);
    }
}
