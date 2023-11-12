<?php

use common\models\OrderItem;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\web\View;
use yii\helpers\VarDumper;

/* @var $this yii\web\View */
/* @var $model common\models\Order */
/* @var $orderItemsDataProvider yii\data\ActiveDataProvider */

$this->title = $model->event->name;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

$js = <<<JS
void function fillStatusId() {
    const statusSelect = document.getElementById('order-status');
    const statusInput = document.getElementById('order-status-input');
    statusSelect.addEventListener('change', (event) => {
        statusInput.value = statusSelect.value;
    })
}();
JS;
$this->registerJs($js, View::POS_END);
?>
<div class="order-view">
    <div class="row">
        <div class="col-md-6">
            <h1 class="h2"><?= Html::encode($this->title) ?></h1>
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    [
                        'attribute' => 'customer.fullName',
                        'label' => 'Customer'
                    ],
                    [
                        'attribute' => 'orderPriceLabel',
                        'label' => 'Price'
                    ],
                    [
                        'attribute' => 'statusName',
                        'label' => 'Status',
                        'format' => 'raw',
                        'value' => function ($model) {
                            return Html::activeDropDownList($model, 'status', $model->orderStatusesMap, ['prompt' => 'All', 'class' => 'form-control']);
                        }
                    ],
                    [
                        'attribute' => 'eventDateLabel',
                        'label' => 'Event Date'
                    ],
                    'transaction_id',
                    [
                        'attribute' => 'created_at',
                        'format' => ['date', 'php:M j, Y, g:i:s A'],
                    ],
                    [
                        'attribute' => 'updated_at',
                        'format' => ['date', 'php:M j, Y, g:i:s A'],
                    ],
                ],
            ]) ?>

            <?php $form = ActiveForm::begin(); ?>
                <?= $form->field($model, 'status')->hiddenInput(['id' => 'order-status-input'])->label(false); ?>
                <?= Html::submitButton('Save', [
                    'class' => 'btn btn-md btn-success'
                ]) ?>
            <?php ActiveForm::end(); ?>
        </div>
        <div class="col-md-6">
            <h2><?= Html::encode($model->customer->fullName) ?></h2>
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'customer.id',
                    [
                        'attribute' => 'customer.first_name',
                        'label' => 'First Name'
                    ],
                    [
                        'attribute' => 'customer.last_name',
                        'label' => 'Last Name'
                    ],
                    [
                        'attribute' => 'customer.phone',
                        'label' => 'Phone'
                    ],
                    [
                        'attribute' => 'customer.email',
                        'label' => 'Email'
                    ],
                    [
                        'attribute' => 'customer.city',
                        'label' => 'City'
                    ],
                    [
                        'attribute' => 'customer.address',
                        'label' => 'Address'
                    ],
                    [
                        'attribute' => 'created_at',
                        'format' => ['date', 'php:M j, Y, g:i:s A'],
                    ],
                    [
                        'attribute' => 'updated_at',
                        'format' => ['date', 'php:M j, Y, g:i:s A'],
                    ],
                ],
            ]) ?>
        </div>
    </div>

    <h2>Extra Items</h2>
    <?= GridView::widget([
        'dataProvider' => $orderItemsDataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // Обычные поля определенные данными содержащимися в $dataProvider.
            // Будут использованы данные из полей модели.
            [
                'attribute' => 'orderItemType',
                'label' => 'Order Item Type'
            ],
            [
                'attribute' => 'title',
                'format' => 'raw',
                'value' => function (OrderItem $model) {
                    $view = empty($model->table_id) ? 'extra-item/view' : 'table/view';
                    return Html::a($model->title, Url::to([$view, 'id' => $model->orderItemId]));
                }
            ],
            'price:currency',
            'quantity',
            [
                'attribute' => 'extraItemPriceLabel',
                'label' => 'Total Price'
            ],
            [
                'attribute' => 'extraItem.imageUrl',
                'label' => 'Image',
                'format' => ['image', ['height' => 50]],
                'options' => [
                    'width' => 80,
                ]
            ],
        ]
    ]) ?>

</div>