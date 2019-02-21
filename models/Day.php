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
 * Он может быть рабочим и выходным, может иметь привязанные события
 * @package app\models
 */
class Day extends Model
{
    public $is_holidays; //является ли выходным (праздничным) днем
    public $is_weekend; // является субботой или воскресеньем

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