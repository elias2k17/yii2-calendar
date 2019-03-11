<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 21.02.2019
 * Time: 12:16
 */

namespace app\models;


use yii\base\Model;

/**
 * Class Day описывает атрибуты сущности "День"
 * Он может быть рабочим и выходным
 * @package app\models
 */
class Day extends Model
{
    /**
     * @var bool
     * является ли выходным (праздничным) днем
     */
    public $is_holidays;
    /**
     * @var bool
     * является концом недели - субботой или воскресеньем
     */
    public $is_weekend;

    public function rules(){
        return [
            ['is_holidays', 'boolean'],
            ['is_weekend', 'boolean'],
        ];
    }

    function attributeLabels()
    {
        return [
            'is_holidays'=>'Праздничный (выходной) день',
            'is_weekend' =>'Конец рабочей недели (СБ, ВС)',
        ];
    }
}