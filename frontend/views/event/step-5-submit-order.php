<?php

use yii\helpers\Html;
use yii\helpers\VarDumper;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this 
 * @var EventOrderForm $model
 */

$this->title = 'Events';
$subTitle = 'Your Order Detail';
?>

<?php $this->beginContent('@frontend/views/event/base.php', ['stepNumber' => $model->stepNumber]); ?>
    <?php $form = ActiveForm::begin(['action' => ['event/submit-order']]); ?>

        <div class="submit-order-wrapper">
            <div class="block-title">
                <?= $subTitle; ?>
            </div>

            <ul class="order-details">
                <li>
                    <div class="inner">
                        <div class="order-item">
                            <div class="order-item-inner">
                                <span>Events Name:</span> <?= $model->event->name; ?></div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="inner">
                        <div class="order-item">
                            <div class="order-item-inner">
                                <span>Number of Tables:</span>
                                <?= $model->table->fullTableNameLabel; ?>
                            </div>
                        </div>
                        <div class="order-item-price">
                            <?= $model->table->priceLabel; ?>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="inner">
                        <div class="order-item">
                            <div class="order-item-inner">
                                <span>Date:</span>
                                <?= $model->eventDateLabel; ?>
                            </div>
                        </div>
                    </div>
                </li>
                <?php if ($model->hasExtraItems) : ?>
                    <li>
                        <div class="inner extended">
                            <div class="order-item">
                                <div class="order-item-inner">
                                    <span>Extra Items:</span>
                                    <?= $model->extraItemsPreviewLabel; ?>
                                </div>
                            </div>
                            <div class="order-item-price">
                                <?= $model->extraItemsTotalPriceLabel; ?>
                            </div>
                        </div>

                        <div class="extend">
                            <ul>
                                <?php foreach ($model->extraItemForms as $extraItemForm) : ?>
                                    <?php if ((int)$extraItemForm->quantity !== 0) : ?>
                                        <li>
                                            <div class="order-item">
                                                <div class="order-item-inner">
                                                    <?= $extraItemForm->extraItemDetailLabel; ?>
                                                </div>
                                            </div>
                                            <div class="order-item-price">
                                                <?= $extraItemForm->extraItemTotalPriceLabel; ?>
                                            </div>
                                        </li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </li>
                <?php endif; ?>
                <li class="total">
                    <div class="inner">
                        <div class="order-item">
                            <div class="order-item-inner">
                                Total
                            </div>
                        </div>
                        <div class="order-item-price">
                            <?= $model->eventTotalPriceLabel; ?>
                        </div>
                    </div>
                </li>
            </ul>

            <?= $form->field($model, 'eventId')->hiddenInput()->label(false); ?>
            <?= $form->field($model, 'tableId')->hiddenInput()->label(false); ?>
            <?= $form->field($model, 'eventDate')->hiddenInput()->label(false); ?>

            <?php foreach ($model->extraItemForms as $index => $extraItemForm) : ?>
                <?= $form->field($extraItemForm, "[{$index}]id")->hiddenInput()->label(false); ?>
                <?= $form->field($extraItemForm, "[{$index}]quantity")->hiddenInput()->label(false); ?>
            <?php endforeach; ?>

            <div class="buttons">
                <?= Html::submitButton('Submit Order', ['class' => 'btn btn-lg btn-success']) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>
<?php $this->endContent(); ?>