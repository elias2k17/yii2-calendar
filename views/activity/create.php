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
                'options' => ['enctype'=>'multipart/form-data'],
        ]); ?>
            <?=$form->field($activity, 'title');?>
            <?= $form->field($activity, 'date_start')->widget(DateTimePicker::class, [
                'language' => 'ru',
                'size' => 'ms',
                'template' => '{input}',
                'pickButtonIcon' => 'glyphicon glyphicon-time',
                'inline' => false,
                'clientOptions' => [
                    'autoclose' => true,
                    'todayHighlight' => true,
                    'weekStart' => 1
                ],
                // при изменении даты, дата окончания события = дата начала события + 1 час
                'clientEvents' => [
                    'changeDate' => 'function(e){
                        if(e.target.id == "activity-date_start") {
                            var date_start = $("#activity-date_start").datetimepicker("getDate");
                            var date_end = date_start.setHours(date_start.getHours() + 1);
                            $("#activity-date_end").datetimepicker("setDate", new Date(date_end));
                        }
                    }'
                ]

            ]);?>
            <?= $form->field($activity, 'date_end')->widget(DateTimePicker::class, [
                'language' => 'ru',
                'size' => 'ms',
                'template' => '{input}',
                'pickButtonIcon' => 'glyphicon glyphicon-time',
                'inline' => false,
                'clientOptions' => [
                    'autoclose' => true,
                    'todayHighlight' => true,
                    'weekStart' => 1
                ],
            ]);?>
            <?=$form->field($activity, 'description')->textarea(['class'=>'form-control', 'data-att'=>'value']);?>
            <?=$form->field($activity, 'use_notification')->checkbox();?>
            <?=$form->field($activity, 'is_blocked')->checkbox();?>
            <?=$form->field($activity, 'is_recurrence')->checkbox();?>
            <?=$form->field($activity, 'recurrence_interval')->input('integer',['value' => 1]);?>
            <?=$form->field($activity, 'recurrence_dimension')->dropDownList($activity->recurrence_dimension);?>
            <?=$form->field($activity, 'images[]')->fileInput(['multiple' => true]); ?>
            <div class="form-group">
                <button type="submit" class="btn btb-default">Создать</button>
            </div>
        <?php ActiveForm::end();?>
    </div>
</div>
