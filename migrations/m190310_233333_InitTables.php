<?php

use yii\db\Migration;

/**
 * Class m190310_233333_InitTables
 */
class m190310_233333_InitTables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // таблица с событием
        $this->createTable('activity',[
            'activity_id'=>$this->primaryKey(),
            'create_date'=>$this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'modify_date'=>$this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'title'=>$this->string(150)->notNull(),
            'date_start' => $this->dateTime()->notNull(),
            'date_end' => $this->dateTime()->notNull(),
            'description'=>$this->text(),
            'use_notification'=>$this->boolean()->notNull()->defaultValue(0),
            'is_blocked'=>$this->boolean()->notNull()->defaultValue(0),
            '$is_recurrence'=>$this->boolean()->notNull()->defaultValue(0),
            'is_repeated'=>$this->boolean()->notNull()->defaultValue(0),
            'recurrence_interval' => $this->integer(),
            'recurrence_dimension'=>$this->string(10),
            'is_completed' => $this->boolean()->defaultValue(0),
        ]);

        // таблица с картинками для события
        $this->createTable('activity_image',[
            'image_id'=>$this->primaryKey(),
            'activity_id'=>$this->integer()->notNull(),
            'image_path'=>$this->string(300)->notNull(),
            'create_date'=>$this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP')
        ]);

        // таблица пользователей
        $this->createTable('user',[
            'user_id'=>$this->primaryKey(),
            'user_email'=>$this->string(150)->notNull(),
            'user_first_name'=>$this->string(150),
            'user_last_name'=>$this->string(150),
            'password'=>$this->string(300)->notNull(),
            'token'=>$this->string(150),
            # id роли пользователя: user - 1, admin - 2
            'role_id' => $this->integer()->notNull()->defaultValue(1),
            'create_date'=>$this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'modify_date'=>$this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'last_login_date'=>$this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'is_active' => $this->boolean()->defaultValue(1),
        ]);

        // таблица с правами пользователей
        $this->createTable('user_role', [
            'role_id'=> $this->primaryKey(),
            'role_name'=>$this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('activity');
        $this->dropTable('activity_image');
        $this->dropTable('user');
        $this->dropTable('user_role');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190310_233333_InitTables cannot be reverted.\n";

        return false;
    }
    */
}
