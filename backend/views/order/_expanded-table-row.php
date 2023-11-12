<?php

use common\models\Order;
use yii\grid\GridView;
use yii\data\ArrayDataProvider;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Order */

$extraItemsDataProvider = new ArrayDataProvider([
    'allModels' => $model->orderExtraItems,
    'pagination' => false,
]);
?>

<div class="row">
    <div class="col-md-4">
        <h4><?= $model->event->name; ?></h4>
        <p><?= Html::img($model->event->imageUrl, ['height' => 100]); ?></p>
        <strong>Table: <?= $model->table->fullTableNameLabel; ?></strong>
        <br>
        <strong>Price: <?= $model->orderPriceLabel; ?></strong>
        <br>
        <strong>Transaction ID: <?= $model->transaction_id ?? 'Not enter yet'; ?></strong>
    </div>
    <div class="col-md-8">
        <h4>Extra Items:</h4>
        <?= GridView::widget([
            'dataProvider' => $extraItemsDataProvider,
            'layout' => '{items}',
            'columns' => [
                [
                    'attribute' => 'extraItem.imageUrl',
                    'label' => false,
                    'format' => ['image', ['height' => 50]],
                    'options' => ['width' => 60]
                ],
                'title',
                'price:currency',
                'quantity',
                'extraItemPriceLabel'
            ],
        ]); ?>
    </div>
</div>