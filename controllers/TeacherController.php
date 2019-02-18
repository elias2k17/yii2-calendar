<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 18.02.2019
 * Time: 0:05
 */

namespace app\controllers;


use yii\web\Controller;

class TeacherController extends Controller
{

    public function actionStudent(){
        \Yii::$app->session->setFlash('error','error text');
        $framework_info='Yii2 v. 2.0.16';
        return $this->render('student', ['data' => $framework_info]);
    }

    public function actionNewStudent() {
        $info='Вызов контроллеров с длинным именем';
        return $this->render('student', ['data' => $info]);
    }
}