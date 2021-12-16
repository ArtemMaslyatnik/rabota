<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%vacancy}}`.
 */
class m211213_052708_create_vacancy_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('vacancy', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'profession_id' => $this->string(),
            'company' => $this->string(),
            'city_id' => $this->integer(),
            'employment_id' => $this->integer(), 
            'education_id' => $this->integer(),
            'practice' => $this->integer(),
            'payment' => $this->integer(),
            'vacancy_description' => $this->text(),
            'vacancy_created_at' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('vacancy');
    }
}
