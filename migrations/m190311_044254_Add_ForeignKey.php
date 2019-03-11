<?php

use yii\db\Migration;

/**
 * Class m190311_044254_Add_ForeignKey
 */
class m190311_044254_Add_ForeignKey extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('activity', 'user_id', $this->integer()->notNull());
        $this->addForeignKey('user_activity_FK', 'activity', 'user_id', 'user','user_id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('user_activity_FK','activity');
        $this->dropColumn('activity', 'user_id');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190311_044254_Add_ForeignKey cannot be reverted.\n";

        return false;
    }
    */
}
