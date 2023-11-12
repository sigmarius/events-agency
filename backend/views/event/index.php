<?php

use common\models\Event;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\EventSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Events';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Event', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'name',
                'format' => 'raw', // значение не должно форматироваться, а должно показываться так, как приходит в виджет
                'value' => function (Event $model) {
                    return Html::a($model->name, Url::to(['view', 'id' => $model->id]));
                }
            ],
            [
                'attribute' => 'imageUrl',
                // 'attribute' => 'thumbWizardListUrl', // показываем thumb 'wizard-list' 
                // 'attribute' => 'thumbWizardModalDesktopUrl', // показываем thumb 'wizard-modal-desktop'
                // 'attribute' => 'thumbWizardModalMobileUrl', // показываем thumb 'wizard-modal-mobile'
                'format' => ['image', ['height' => 50]]
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
