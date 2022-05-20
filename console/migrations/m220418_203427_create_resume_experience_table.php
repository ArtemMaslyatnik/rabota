<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%resume_experience}}`.
 */
class m220418_203427_create_resume_experience_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%resume_experience}}', [
            'id' => $this->primaryKey(),
            'profession_id' => $this->integer(11),
            'city_id' => $this->integer(11),
            'company' => $this->string(255),
            'activity_company' => $this->string(255),
            'responsibilities' => $this->text(),
            'date_from' => $this->integer(11),
            'date_by' => $this->integer(11),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%experience}}');
    }
}
