<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%respond_}}`.
 */
class m220120_103921_create_respond_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%respond}}', [
            'id' => $this->primaryKey(),
            'vacancy_id' => $this->integer(),
            'name' => $this->string(),
            'phone' => $this->string(),
            'email' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%respond}}');
    }
}
