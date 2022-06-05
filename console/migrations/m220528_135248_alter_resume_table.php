<?php

use yii\db\Migration;

/**
 * Class m220528_135248_alter_resume_table
 */
class m220528_135248_alter_resume_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->addColumn('{{%resume}}', 'user_id', $this->integer(11));
    }

    /**
     * {@inheritdoc}
     */
    public function down() 
    {
        $this->dropColumn('{{%resume}}', 'user_id', $this->integer(11));
    }

}
