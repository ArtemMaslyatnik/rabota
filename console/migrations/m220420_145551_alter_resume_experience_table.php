<?php

use yii\db\Migration;

/**
 * Class m220420_145551_alter_resume_experience_table
 */
class m220420_145551_alter_resume_experience_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->addColumn('{{%resume_experience}}', 'resume_id', $this->integer(11));
    }

    /**
     * {@inheritdoc}
     */
    public function down() 
    {
        $this->dropColumn('{{%resume_experience}}', 'resume_id');
    }

}
