<?php

use common\models\Order;
use common\models\OrderSearch;
use yii\helpers\Html;
use yii\grid\GridView;
use kartik\daterange\DateRangePicker;

/* @var $this yii\web\View */
/* @var $searchModel common\models\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Order', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= \kartik\grid\GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => \kartik\grid\ExpandRowColumn::class,
                'format' => 'html',
                'value' => function ($model, $key, $index, $column) {
                    return \kartik\grid\GridView::ROW_COLLAPSED;
                },
                'detail' => function (Order $model, $key, $index, $column) {
                    /** @var \yii\web\View $this */
    
                    return $this->renderFile('@backend/views/order/_expanded-table-row.php', ['model' => $model]);
                },
                'headerOptions' => ['class' => 'kartik-sheet-style'],
                'expandOneOnly' => true,
                'expandIcon' => '<i class="glyphicon glyphicon-menu-right"></i>',
                'collapseIcon' => '<i class="glyphicon glyphicon-menu-down"></i>'
            ],
            [
              'attribute' => 'id',
              'options' => [
                  'width' => 80,
              ]
            ],
            [
                'attribute' => 'event.name', 
                'header' => 'Event',
                'filter' => false,
                'format' => 'raw', // значение не должно форматироваться, а должно показываться так, как приходит в виджет
                'value' => function ($model) {
                    return Html::a($model->event->name, ['view', 'id' => $model->id]);
                }
            ],
            [
                'attribute' => 'customer.fullName', 
                'header' => 'Customer',
                'filter' => Html::activeDropDownList($searchModel, 'customer_id', $searchModel->customersList, ['prompt' => 'All', 'class' => 'form-control'])
            ],
            [
                'attribute' => 'orderPriceLabel',
                'header' => 'Price',
                // 'filter'  => false
            ],
            [
                'attribute' => 'statusName', 
                'header' => 'Status',
                'filter' => Html::activeDropDownList($searchModel, 'status', $searchModel->orderStatusesMap, ['prompt' => 'All', 'class' => 'form-control'])
            ],
            [
                'attribute' => 'eventDateLabel',
                'filter' => DateRangePicker::widget([
                    'model' => $searchModel,
                    // атрибут, в котором будет храниться сырое значение диапазона дат
                    'attribute' => 'eventDateRange',
                    'convertFormat' => true,
                    'startAttribute' => 'eventDateStart',
                    'endAttribute' => 'eventDateEnd',
                    'pluginOptions' => [
                        'locale' => ['format' => 'Y-m-d'],
                    ],
                    'options' => [
                        'placeholder' => 'Select range...',
                        'class' => 'form-control'
                    ]
                ]),
                'options' => [
                    'width' => 220,
                ]
            ],
            [
                'attribute' => 'created_at',
                'filter'  => false,
                'format' => ['date', 'php:M j, Y, g:i:s A'],
            ]
        ],
    ]); ?>


</div>
