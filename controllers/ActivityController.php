<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 19.02.2019
 * Time: 22:49
 */

namespace app\controllers;


use app\base\BaseController;
use app\controllers\actions\ActivityCreateAction;
use app\models\Activity;
use yii\web\Controller;

class ActivityController extends BaseController
{
    public function actions() {
        return [
            'create'=>['class' => ActivityCreateAction::class],
        ];
    }
}