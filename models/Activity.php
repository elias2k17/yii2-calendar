<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 19.02.2019
 * Time: 23:04
 */

namespace app\models;


use yii\base\Model;

/**
 * Class Activity - описывает атрибуты события (активности)
 * @package app\models
 */
class Activity extends Model
{
    public $title;
    public $description;
    public $date_start;
    public $date_end;
    public $email;
    public $recurrence_interval=0; // значение повторяющегося интервала
    public $recurrence_dimension; //выбор периода, через который надо повторять событие: day, week, month, year
    public $is_recurrence; // событие повторяемое
    public $is_blocked; // событие блокирующее

    public function getRecurrenceDimension(){
        return ['day' => 'День',
            'week' => 'Неделя',
            'month' => 'Месяц',
            'year' => 'Месяц'];
    }
    # создали функцию для валидации свойств сущности Activity
    public function rules() {
        return [
            ['title', 'string', 'max' => 150, 'min' => 2],
            [['title', 'date_start','email'], 'required'],
            ['email', 'email'],
            [['date_start','date_end','string']],
//            ['date_start','datetime'],
//            ['date_end','datetime'],
            ['is_blocked', 'boolean'],
            ['recurrence_interval', 'integer'],
            ['is_recurrence', 'boolean'],

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
        ];
    }
}