<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 10.03.2019
 * Time: 12:49
 */

namespace app\components;


use app\models\Calendar;
use yii\base\Component;

class CalendarComponent extends Component
{
    /**
     * @var string class of Calendar entity
     */
    public $calendar_class;

    /**
     * @throws \Exception
     */
    public function init(){
        parent::init();

        if(empty($this->calendar_class)){
            throw new \Exception('Attribute calendar_class is required');
        }
    }

    /**
     * @return Calendar
     */
    public function getModel($params = null) {
        $model = new $this->calendar_class;
        if($params && is_array($params)){
            $model->load($params);
        }
        return $model;
    }

    /**
     * @param $model
     * @return bool
     * валидация сущности Календарь (Calendar)
     */
    public function createCalendar(&$model):bool {
        return $model->validate();
    }

    /**
     *
     * возвращает ВСЕ события АВТОРИЗОВАННОГО пользователя
     */
    public function getUserActivities(){

    }

    /**
     *
     * возвращает ВСЕ события АВТОРИЗОВАННОГО пользователя  за выбранный день
     */
    public function getUserActivitiesByDate(){

    }

    /**
     *
     * возвращает ВСЕ события ВСЕХ пользователей (для админа)
     */
    public function getAllUsersActivities(){

    }

    /**
     *
     * возвращает ВСЕ события ВСЕХ пользователей (для админа) за выбранный день
     */
    public function getAllUsersActivitiesByDate(){

    }

}