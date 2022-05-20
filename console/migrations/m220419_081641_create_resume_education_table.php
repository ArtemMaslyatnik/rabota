<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%resume_education}}`.
 */
class m220419_081641_create_resume_education_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%resume_education}}', [
            'id' => $this->primaryKey(),
            'resume_id' => $this->integer(11),
            'educational_institution' => $this->string(255),
            'faculty_specialty' => $this->string(255),
            'city_id' => $this->integer(11),
            'education_details' => $this->string(255),
            'date_from' => $this->integer(11),
            'date_by' => $this->integer(11),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%resume_education}}');
    }
}
