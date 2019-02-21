<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 20.02.2019
 * Time: 8:13
 */

namespace app\controllers\actions;

use app\components\ActivityComponent;
use app\models\Activity;
use yii\base\Action;

class ActivityCreateAction extends Action
{
    /**
     * @return string
     * @throws \yii\base\InvalidConfigException
     */
    public function run() {

        /** @var ActivityComponent $comp */
        $comp = \Yii::createObject([
            'class' => ActivityComponent::class,
            'activity_class' => Activity::class,
        ]);

        if(\Yii::$app->request->isPost){
            $activity = $comp->getModel(\Yii::$app->request->post());
            $comp->createActivity($activity);
        } else {
            $activity = $comp->getModel();
        }

//        $activity->recurrence_interval = 0;
//        $activity->recurrence_dimension = [
//            'day' => 'День',
//            'week' => 'Неделя',
//            'month' => 'Месяц',
//            'year' => 'Месяц'
//        ];
        return $this->controller->render('create', ['activity' => $activity]);
    }
}