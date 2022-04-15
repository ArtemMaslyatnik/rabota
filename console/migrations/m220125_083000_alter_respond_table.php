<?php

use yii\db\Migration;

/**
 * Class m220125_083000_alter_respond_table
 */
class m220125_083000_alter_respond_table extends Migration
{


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->addColumn('{{%respond}}', 'fileresume', $this->string(255));
        $this->addColumn('{{%respond}}', 'transmittalletter', $this->string(255));
    }

    public function down()
    {
        $this->dropColumn('{{%respond}}', 'fileresume');
        $this->dropColumn('{{%respond}}', 'transmittalletter');
    }

}
