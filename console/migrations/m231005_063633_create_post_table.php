<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%post}}`.
 */
class m231005_063633_create_post_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%post}}', [
            'id' => $this->primaryKey(),
            'author_id' => $this->integer()->notNull(),
            'title' => $this->string()->notNull(),
            'body' => $this->text()->notNull(),
            'created_at' => $this->dateTime()->notNull(),
        ]);
    
        $this->addForeignKey('{{%fk-post-author_id}}', '{{%post}}', 'author_id', '{{%user}}', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('{{%fk-post-author_id}}', '{{%post}}');

        $this->dropTable('{{%post}}');
    }
}
