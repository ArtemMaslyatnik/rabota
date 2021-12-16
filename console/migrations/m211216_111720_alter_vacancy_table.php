<?php

use yii\db\Migration;

/**
 * Class m211216_111720_alter_vacancy_table
 */
class m211216_111720_alter_vacancy_table extends Migration
{
     // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->addColumn('{{%vacancy}}', 'category_id', $this->integer());
        
    }

    public function down()
    {
        $this->dropColumn('{{%vacancy}}', 'category_id');
    }
}
