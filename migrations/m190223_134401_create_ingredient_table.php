<?php

use yii\db\Migration;

/**
 * Handles the creation of table `ingredient`.
 */
class m190223_134401_create_ingredient_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('ingredient', [
            'id' => $this->primaryKey(25)->notNull(),
            'ingredient' => $this->string(255)->notNull(),
            'visibility' => $this->integer(1)->notNull(),
        ]);
        
        $this->insert('ingredient', [
            'ingredient' => '',
            'visibility' => '1',
        ]);
        $this->insert('ingredient', [
            'ingredient' => 'sugar',
            'visibility' => '1',
        ]);
        $this->insert('ingredient', [
            'ingredient' => 'rice',
            'visibility' => '1',
        ]);
        $this->insert('ingredient', [
            'ingredient' => 'potatoes',
            'visibility' => '1',
        ]);
        $this->insert('ingredient', [
            'ingredient' => 'chicken',
            'visibility' => '1',
        ]);
        $this->insert('ingredient', [
            'ingredient' => 'milk',
            'visibility' => '1',
        ]);
        $this->insert('ingredient', [
            'ingredient' => 'mayonnaise',
            'visibility' => '1',
        ]);
        $this->insert('ingredient', [
            'ingredient' => 'salt',
            'visibility' => '1',
        ]);
        $this->insert('ingredient', [
            'ingredient' => 'flour',
            'visibility' => '1',
        ]);
        $this->insert('ingredient', [
            'ingredient' => 'tomato',
            'visibility' => '1',
        ]);
        $this->insert('ingredient', [
            'ingredient' => 'sausage',
            'visibility' => '1',
        ]);
        $this->insert('ingredient', [
            'ingredient' => 'onion',
            'visibility' => '1',
        ]);
        $this->insert('ingredient', [
            'ingredient' => 'dill',
            'visibility' => '1',
        ]);
        $this->insert('ingredient', [
            'ingredient' => 'buckwheat',
            'visibility' => '1',
        ]);
        $this->insert('ingredient', [
            'ingredient' => 'pepper',
            'visibility' => '1',
        ]);
        $this->insert('ingredient', [
            'ingredient' => 'eggs',
            'visibility' => '1',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('ingredient');
    }
}
