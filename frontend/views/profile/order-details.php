<?php

use yii\helpers\Html;
use yii\helpers\VarDumper;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this 
 * @var Order $model
 */

$this->title = 'Purchase History Detail';
$subTitle = 'Your History Order Detail';
?>

<div class="section section-profile">
    <div class="section-container">
        <div class="submit-order-wrapper">
            <div class="block-title">
                <?= $subTitle; ?>
            </div>

            <ul class="order-details">
                <li>
                    <div class="inner">
                        <div class="order-item">
                            <div class="order-item-inner">
                                <span>Transaction ID:</span>
                                <?= $model->transactionIdLabel; ?>
                            </div>
                        </div>
                    </div>
                </li>
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
                                    <?= $model->orderExtraItemsPreviewLabel; ?>
                                </div>
                            </div>
                            <div class="order-item-price">
                                <?= $model->orderExtraItemsTotalPriceLabel; ?>
                            </div>
                        </div>

                        <div class="extend">
                            <ul>
                                <?php foreach ($model->orderExtraItems as $orderExtraItem) : ?>
                                    <li>
                                        <div class="order-item">
                                            <div class="order-item-inner">
                                                <?= $orderExtraItem->extraItemDetailLabel; ?>
                                            </div>
                                        </div>
                                        <div class="order-item-price">
                                            <?= $orderExtraItem->extraItemPriceLabel; ?>
                                        </div>
                                    </li>
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
                            <?= $model->orderPriceLabel; ?>
                        </div>
                    </div>
                </li>
            </ul>

            <div class="list-controls">
                <?= Html::a('Back to Profile', ['profile/index']) ?>
            </div>

            <?php if (empty($model->transaction_id)) : ?>
                <div class="buttons">
                    <?= Html::a('Submit Transaction ID', '#', [
                        'class' => 'btn btn-lg btn-success',
                        'data-toggle' => 'modal',
                        'data-target' => "#historyDetailMessage"
                    ]) ?>
                </div>
            <?php endif ?>
        </div>
    </div>
</div>

<?php $form = ActiveForm::begin(); ?>
<div class="modal fade" tabindex="-1" role="dialog" id="historyDetailMessage">
    <div class="modal-dialog">
        <div class="modal-content">
            <a href="#" class="close-modal" data-dismiss="modal" aria-label="Close"></a>
            <div class="modal-header">
                <h4 class="modal-title">Enter Transaction ID</h4>
            </div>
            <div class="modal-body">
                <div class="transaction-id-form">
                    <?= $form->field($model, 'transaction_id')->textInput(['placeholder' => "Transaction ID"])->label(false); ?>

                    <div class="buttons">
                        <?= Html::submitButton('Submit', [
                            'class' => 'btn btn-md btn-success'
                        ]) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>