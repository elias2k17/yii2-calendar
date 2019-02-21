<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 21.02.2019
 * Time: 7:02
 */

namespace app\components;


use app\models\Activity;
use yii\base\Component;

class ActivityComponent extends Component
{
    public $activity_class;

    public function init() {
         parent::init();

         if(empty($this->activity_class)){
             throw  new \Exception('Attribute activity_class is required');
         }
    }

    /**
     * @return Activity
     */
    public function getModel($params = null) {
        /** @var Activity $model */
        $model = new $this->activity_class;
        if($params && is_array($params)) {
            $model->load($params);
        }
        return $model;
    }

    /**
     * @param $model
     * @return bool
     */
    public function createActivity(&$model):bool {
        return $model->validate();
    }
}