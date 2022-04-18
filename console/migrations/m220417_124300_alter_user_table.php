<?php

use yii\db\Migration;

/**
 * Class m220417_124300_alter_user_table
 */
class m220417_124300_alter_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->addColumn('{{%user}}', 'employer', $this->integer(11));
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropColumn('{{%user}}', 'employer');
    }

}
