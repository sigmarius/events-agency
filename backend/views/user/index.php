<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'id',
                'options' => [
                    'width' => 80,
                ]
            ],
            [
                'attribute' => 'fullName',
                'format' => 'raw', 
                'value' => function ($model) {
                    return Html::a($model->fullName, ['view', 'id' => $model->id]);
                }
            ],
            'username',
            'email:email',
            //'status',
            //'updated_at',
            //'verification_token',
            //'first_name',
            //'last_name',
            //'address',
            'phone',
            'city',
            'created_at',
            [
                'attribute' => 'created_at',
                'format' => ['date', 'php:M j, Y'],
                'options' => [
                    'width' => 100,
                ]
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update}'
            ],
        ],
    ]); ?>


</div>
