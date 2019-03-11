<?php

use yii\db\Migration;

/**
 * Class m190311_070611_Add_SomeData
 */
class m190311_070611_Add_SomeData extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('user',[
            'user_id' => 1,
            'user_email' => 'user@domain.com',
            'user_first_name' => 'User First Name',
            'user_last_name' => 'User Last Name',
            'password' => '123',
        ]);
        $this->insert('user',[
            'user_id' => 2,
            'user_email' => 'user2@domain.com',
            'user_first_name' => 'User2 First Name',
            'user_last_name' => 'User2 Last Name',
            'password' => '123',
        ]);

        $this->batchInsert('activity', ['user_id', 'title', 'date_start', 'date_end', 'use_notification'],[
            [1,'Заголовок 1','2019-01-01 15:00', '2019-01-01 16:00',0],
            [1,'Заголовок 2','2019-02-01 12:00', '2019-02-03 14:00',0],
            [1,'Заголовок 3',date('Y-m-d H:i'), date('Y-m-d H:i'),0],
            [1,'Заголовок 4',date('Y-m-d H:i'), date('Y-m-d H:i'),1],
            [2,'Заголовок 5',date('Y-m-d H:i'), date('Y-m-d H:i'),0],
            [2,'Заголовок 6','2018-03-10 14:00', '2019-03-10 15:00',0],
            [2,'Заголовок 7','2019-03-08 09:00', '2018-03-08 10:00',1],
            [2,'Заголовок 8',date('Y-m-d H:i'), date('Y-m-d H:i'),0],

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('user');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190311_070611_Add_SomeData cannot be reverted.\n";

        return false;
    }
    */
}
