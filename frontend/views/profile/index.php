<?php

use common\models\Order;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\StringHelper;
use yii\helpers\VarDumper;
use yii\grid\GridView;
use frontend\components\SerialColumn;

/**
 * @var yii\web\View $this 
 * @var common\models\User $user
 * @var yii\data\ActiveDataProvider $orderDataProvider  
 */
$this->title = 'Profile';
?>

<div class="section section-profile">
    <div class="section-container">
        <div class="profile-block">
            <?= Html::a('Edit Profile', ['profile/edit'], ['class' => 'btn btn btn-view pull-right']) ?>

            <div class="block-title">
                <?= Html::encode($this->params['userDetailTitle']) ?>
            </div>

            <ul class="user-details">
                <li><span>Name:</span> <?= $user->fullName; ?></li>
                <li><span>Address:</span> <?= $user->fullAddress; ?></li>
                <li><span>Phone:</span> <?= $user->phone; ?></li>
                <li><span>Email:</span> <?= $user->email; ?></li>
            </ul>
        </div>

        <div class="profile-block">
            <div class="block-title">Purchase History</div>

            <?= GridView::widget([
                'dataProvider' => $orderDataProvider,
                'tableOptions' => [
                    'class' => 'table table-striped table-history'
                ],
                'layout' => "{items}\n{pager}",
                'columns' => [
                    [
                        'class' => 'frontend\components\SerialColumn',
                    ],

                    // Обычные поля определенные данными содержащимися в $dataProvider.
                    // Будут использованы данные из полей модели.
                    'event.name:text:Item',
                    [
                        'attribute' => 'created_at',
                        'format' => ['date', 'php:M j, Y'],
                        'label' => 'Date',
                    ],
                    'orderPrice:currency',
                    [
                        'attribute' => 'statusName',
                        'label' => '',
                        'format' => 'raw',
                        'value' => function (Order $model) {
                            return Html::tag('div', $model->statusName, ['class' => "purchase-status {$model->OrderCssClass}"]);
                        }
                    ],
                    [
                        'label' => '',
                        'format' => 'raw',
                        'value' => function (Order $model) {
                            return Html::a('View', 
                                Url::to(['profile/order-details', 'id' => $model->id]), 
                                ['class' => 'btn-view']
                            );
                        }
                    ]
                ]
            ]) ?>
        </div>
    </div>
</div>