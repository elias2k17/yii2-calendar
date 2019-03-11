<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 11.03.2019
 * Time: 10:13
 */

namespace app\controllers;


use app\base\BaseController;
use app\components\DAOComponent;

class DAOController extends BaseController
{
    public function actionTest(){

        /** @var DAOComponent $dao */
        $dao = \Yii::$app->dao;
        $userlist = $dao->getUserList();

        return $this->render('test', ['userlist' => $userlist]);
    }

}