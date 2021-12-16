<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%profession}}`.
 */
class m211213_060319_create_profession_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%profession}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%profession}}');
    }
}
