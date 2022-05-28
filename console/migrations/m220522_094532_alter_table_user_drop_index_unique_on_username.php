<?php

use yii\db\Migration;

/**
 * Class m220522_094532_alter_table_user_drop_index_unique_on_username
 */
class m220522_094532_alter_table_user_drop_index_unique_on_username extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropIndex('username', 'user');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->createIndex('username', 'user', 'username', $unique = true);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220522_094532_alter_table_user_drop_index_unique_on_username cannot be reverted.\n";

        return false;
    }
    */
}
