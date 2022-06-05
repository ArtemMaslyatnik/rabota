<?php

use yii\db\Migration;

/**
 * Class m220428_080018_alter_resume_table
 */
class m220428_080018_alter_resume_table extends Migration
{
/**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->addColumn('{{%resume}}', 'created_at', $this->integer(11));
        $this->addColumn('{{%resume}}', 'updated_at', $this->integer(11));
    }

    /**
     * {@inheritdoc}
     */
    public function down() 
    {
        $this->dropColumn('{{%resume}}', 'created_at', $this->integer(11));
        $this->dropColumn('{{%resume}}', 'updated_at', $this->integer(11));
    }
}
