<?php

use yii\db\Migration;

/**
 * Class m220120_105022_alter_vacancy_table
 */
class m220120_105022_alter_vacancy_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->addColumn('{{%vacancy}}', 'email', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropColumn('{{%vacancy}}', 'email');
    }


}
