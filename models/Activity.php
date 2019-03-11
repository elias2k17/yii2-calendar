<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 19.02.2019
 * Time: 23:04
 */

namespace app\models;


use yii\base\Model;
use yii\web\UploadedFile;

/**
 * Class Activity - описывает атрибуты события (активности)
 * @package app\models
 */
class Activity extends Model
{
    public $activity_id;
    public $user_id; // ID пользователя
    public $title;
    public $description;
    public $date_start;
    public $date_end;
    public $create_date; //дата создания события
    public $modify_date; //дата последнего обновления события
    public $use_notification; //уведомплять о событии
    public $recurrence_interval; // значение повторяющегося интервала
    public $recurrence_dimension; //выбор периода, через который надо повторять событие: day, week, month, year
    public $is_recurrence; // событие повторяемое
    public $is_blocked; // событие блокирующее
    public $is_completed; // событие выполнено


    /** @var UploadedFile */
    public $images; //массив картинкок к событию
    /** @var UploadedFile */
    public $uploadedImages; //массив сохраненных картинок к событию

    # создали функцию для валидации свойств сущности Activity
    public function rules() {
        return [
            ['title', 'string', 'max' => 150, 'min' => 2],
            [['title', 'date_start','date_end'], 'required'],
            [['date_start', 'date_end'],'datetime', 'format'=>'php:Y-m-d H:i'],
            [['is_blocked', 'is_recurrence', 'use_notification'], 'boolean'],
            ['recurrence_interval', 'integer'],
            ['recurrence_interval', 'default', 'value' => 1],
            ['recurrence_interval', 'compare', 'compareValue' => 0, 'operator' => '>', 'type' => 'number'],
            ['recurrence_interval', 'required', 'when' => function($model){
                return $model->is_recurrence ? true: false;
            }],
            //['recurrence_dimension', 'validateRecurrenceDimension', 'skipOnEmpty' => false, 'skipOnError' => false],
            [['images'], 'file', 'extensions' => ['jpg', 'png'], 'mimeTypes' => 'image/jpeg, image/png', 'maxFiles' => 10],
        ];
    }

    function attributeLabels()
    {
        return [
            'title'=>"Заголовок активности",
            'description'=>'Описание',
            'is_blocked' => 'Блокирующее',
            'email' => 'Адрес электронной почты',
            'date_start' => 'Начало события',
            'date_end' => 'Конец события',
            'recurrence_interval' => 'Интервал',
            'recurrence_dimension' => 'Повторять через',
            'is_recurrence' => 'Повторяемое событие',
            'use_notification' => 'Уведомление о событии',
        ];
    }

    /**
     * @return array
     * функция для получения типов возможных получающихся интервалов: day, week, month, year
     */
    public function getRecurrenceDimension() {
        return [
            'day' => 'День',
            'week' => 'Неделя',
            'month' => 'Месяц',
            'year' => 'Год'
        ];
    }

    /**
     * @param $attribute
     * @return boolean
     * валидация значения интервала повторения: day, week, month, year
     */
    public function validateRecurrenceDimension($attribute)
    {
        if (!in_array($this->$attribute, $this->getRecurrenceDimension())) {
            $validRecurrenceDimension = ' | ';

            foreach ($this->getRecurrenceDimension() as $key) {
                $validRecurrenceDimension .= $key . ' | ';
            }
            $this->addError($attribute, 'Неверное значение интервала повторения! Допустимые' . $validRecurrenceDimension);
        }
        return true;
    }

}