<?php

use yii\db\Migration;

/**
 * Handles the creation of table `dishes`.
 */
class m190223_123808_create_dishes_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('dishes', [
            'id' => $this->primaryKey(25)->notNull(),
            'dish' => $this->string(255)->notNull(),
            'ingredient1' => $this->integer(25)->notNull(),
            'ingredient1_name' => $this->string(255)->notNull(),
            'ingredient2' => $this->integer(25)->notNull(),
            'ingredient2_name' => $this->string(255)->notNull(),
            'ingredient3' => $this->integer(25)->notNull(),
            'ingredient3_name' => $this->string(255)->notNull(),
            'ingredient4' => $this->integer(25)->notNull(),
            'ingredient4_name' => $this->string(255)->notNull(),
            'ingredient5' => $this->integer(25)->notNull(),
            'ingredient5_name' => $this->string(255)->notNull(),
        ]);
        
        // add foreign key for table `ingredients`
        $this->addForeignKey(
            'fk-dishes-ingredient1',
            'dishes',
            'ingredient1',
            'ingredients',
            'id',
            'RESTRICT'
            );
       $this->addForeignKey(
            'fk-dishes-ingredient1',
            'dishes',
            'ingredient2',
            'ingredients',
            'id',
            'RESTRICT'
            );
        $this->addForeignKey(
            'fk-dishes-ingredient1',
            'dishes',
            'ingredient3',
            'ingredients',
            'id',
            'RESTRICT'
            );
        $this->addForeignKey(
            'fk-dishes-ingredient1',
            'dishes',
            'ingredient4',
            'ingredients',
            'id',
            'RESTRICT'
            );
        $this->addForeignKey(
            'fk-dishes-ingredient1',
            'dishes',
            'ingredient5',
            'ingredients',
            'id',
            'RESTRICT'
            );
        
        
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `ingredients`
        $this->dropForeignKey(
            'fk-dishes-ingredient1',
            'dishes'
        );
        $this->dropForeignKey(
            'fk-dishes-ingredient2',
            'dishes'
        );
        $this->dropForeignKey(
            'fk-dishes-ingredient3',
            'dishes'
        );
        $this->dropForeignKey(
            'fk-dishes-ingredient4',
            'dishes'
        );
        $this->dropForeignKey(
            'fk-dishes-ingredient5',
            'dishes'
        );
        
        $this->dropTable('dishes');
    }
}
