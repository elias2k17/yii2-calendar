<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 10.03.2019
 * Time: 12:46
 */

namespace app\components;


use app\models\Day;
use yii\base\Component;

class DayComponent extends Component
{
    /**
     * @var string class of day entity
     */
    public $day_class;

    /**
     * @throws \Exception
     */
    public function init() {
        parent::init();

        if(empty($this->day_class)) {
            throw new \Exception('Attribute day_class is required');
        }
    }

    /**
     * @return Day
     * создает/возвращает сущность День (Day)
     */
    public function getModel($params = null) {
        $model = new $this->day_class;
        if($params && is_array($params)) {
            $model->load($params);
        }
        return $model;
    }

    /**
     * @param $model
     * @return bool
     * валидация сущности День (Day)
     */
    public function createDay(&$model):bool {
        return $model->validate();
    }

    /**
     * возвращает массив с объектами  Activity
     */
    public function getLinkedActivity() {

    }

    /**
     * удаляет связь с Событием
     */
    public function removeLinkWithActivity() {

    }

    /**
     * добавляет связь с Событием
     */
    public function addLinkWithActivity() {

    }

}