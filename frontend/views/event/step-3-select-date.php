<?php

use frontend\models\EventOrderForm;
use yii\helpers\Html;
use yii\helpers\VarDumper;
use yii\web\View;
use yii\widgets\ActiveForm;
use frontend\widgets\DateInputWidget;

/**
 * @var yii\web\View $this 
 * @var EventOrderForm $model
 */

$this->title = 'Events';
?>

<?php $this->beginContent('@frontend/views/event/base.php', ['stepNumber' => $model->stepNumber]); ?>

    <?php $form = ActiveForm::begin(['action' => ['event/select-date']]); ?>
        <?= $form->field($model, 'eventId')->hiddenInput()->label(false); ?>
        <?= $form->field($model, 'tableId')->hiddenInput()->label(false); ?>
        <?= $form->field($model, 'eventDate')->widget(DateInputWidget::class, [
            'monthsCount' => 10, // calendar months cards count
        ]) ?>

        <div class="buttons">
            <?= Html::submitButton('Next', ['class' => 'btn btn-lg btn-success']) ?>
        </div>
    <?php ActiveForm::end(); ?>

<?php $this->endContent(); ?>