<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 10.03.2019
 * Time: 13:35
 */
use \yii\helpers\Html;
?>

<div class="row">
    <div class="col-md-6">
        <h3>Добавлено новое событие:</h3>
        <ul class="list-group">
            <li class="list-group-item"><label>Заголовок:</label> <?= Html::encode($activity->title); ?></li>
            <li class="list-group-item"><label>Начало:</label> <?= Html::encode($activity->date_start); ?></li>
            <li class="list-group-item"><label>Конец:</label> <?= Html::encode($activity->date_end); ?></li>
            <li class="list-group-item"><label>Описание:</label> <?= Html::encode($activity->description); ?></li>
            <li class="list-group-item"><label>Уведомлять о событии:</label> <?= Html::encode($activity->use_notification) ? 'Да' : 'Нет'; ?></li>
            <li class="list-group-item"><label>Блокирующее:</label> <?= Html::encode($activity->is_blocked) ? 'Да' : 'Нет'; ?></li>
            <li class="list-group-item"><label>Повторяющееся:</label> <?= Html::encode($activity->is_recurrence) ? 'Да' : 'Нет'; ?></li>
            <?php if($activity->is_recurrence) {
                    echo Html::tag('li', Html::tag('label','Интервал:') . ' ' . Html::encode($activity->recurrence_interval), ['class' => 'list-group-item']);
                    echo Html::tag('li', Html::tag('label', 'Повторять через:') . ' ' . Html::encode($activity->recurrence_dimension), ['class' => 'list-group-item']);
                }
            ?>

            <li class="list-group-item"><label>Загруженные файлы:</label>
                <div class="row">
                    <?php if (empty($activity->images)) {
                        echo 'Нет';
                    } else {
                        foreach ($activity->uploadedImages as $image) {
                            echo Html::img('/upload/' . $image, ['class' => 'col-lg-3']);
                        }
                    }
                    ?>
                </div>
            </li>

        </ul>
        <?= Html::a('Создать новое событие', ['/activity/create'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Редактировать', ['/activity/edit'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Показать календарь', ['/calendar/view'], ['class' => 'btn btn-primary']) ?>
    </div>

</div>
