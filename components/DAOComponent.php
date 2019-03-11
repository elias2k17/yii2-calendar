<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 11.03.2019
 * Time: 10:16
 */

namespace app\components;


use yii\base\Component;

class DAOComponent extends Component
{
    /**
     * @return \yii\db\Connection
     */
    public function getDB(){
       return \Yii::$app->db;
    }

    public function getUserList(){
        $sql = 'select * from user';
        return $this->getDB()->createCommand($sql)->queryAll();
    }
}