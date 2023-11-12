<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%extra_item}}`.
 */
class m231008_165742_create_extra_item_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%extra_item}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'price' => $this->decimal(10, 2)->notNull(),
            'image' => $this->string()->notNull(),
            'description' => $this->text()->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%extra_item}}');
    }
}
