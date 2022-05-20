<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%resume}}`.
 */
class m220418_203236_create_resume_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%resume}}', [
            'id' => $this->primaryKey(),
            'surname' => $this->string(),
            'name' => $this->string(),
            'patronymic' => $this->string(),
            'phone' => $this->string(),
            'email' => $this->string(),
            'date_of_birth' => $this->integer(11),
            'city_id' => $this->integer(11),
            'profession_id' => $this->integer(11),
            'employment_id' => $this->integer(11),
            'salary' => $this->integer(11),
            'address' => $this->string(255),
            'date_added' => $this->integer(11),
            'date_modified' => $this->integer(11),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%resume}}');
    }
}
