<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%employment}}`.
 */
class m211213_060424_create_employment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%employment}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%employment}}');
    }
}
