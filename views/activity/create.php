<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 19.02.2019
 * Time: 22:59
 * @var $activity \app\models\Activity
 */
use yii\bootstrap\ActiveForm;
use dosamigos\datetimepicker\DateTimePicker;
?>

<div class="row">
    <div class="col-md-6">
        <h2>Создание новой активности</h2>
        <?php $form=ActiveForm::begin([
                'action' => '',
                'method' => 'POST',
                'id' => 'activity',
                'options' => ['enctype'=>'']
        ]); ?>
            <?=$form->field($activity, 'title');?>
            <?= $form->field($activity, 'date_start')->widget(DateTimePicker::class, [
                'language' => 'ru',
                'size' => 'ms',
                'template' => '{input}',
                'pickButtonIcon' => 'glyphicon glyphicon-time',
                'inline' => true,
            ]);?>
            <?= $form->field($activity, 'date_end')->widget(DateTimePicker::class, [
                'language' => 'ru',
                'size' => 'ms',
                'template' => '{input}',
                'pickButtonIcon' => 'glyphicon glyphicon-time',
                'inline' => true,
            ]);?>

            <?=$form->field($activity, 'description')->textarea(['class'=>'form-control', 'data-att'=>'value']);?>
            <?=$form->field($activity, 'email')->input('email');?>
            <?=$form->field($activity, 'description')->textarea(['class'=>'form-control', 'data-att'=>'value']);?>
            <?=$form->field($activity, 'is_blocked')->checkbox();?>
            <?=$form->field($activity, 'is_recurrence')->checkbox();?>
            <?=$form->field($activity, 'recurrence_interval')->input('datetime');?>
            <?=$form->field($activity, 'recurrence_dimension')->dropDownList($activity->getRecurrenceDimension());?>
            <div class="form-group">
                <button type="submit" class="btn btb-default">Создать</button>
            </div>
        <?php ActiveForm::end();?>
    </div>
</div>
