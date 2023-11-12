<?php

use common\models\ExtraItem;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ExtraItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Extra Items';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="extra-item-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Extra Item', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'title',
                'format' => 'raw', // значение не должно форматироваться, а должно показываться так, как приходит в виджет
                'value' => function (ExtraItem $model) {
                    return Html::a($model->title, Url::to(['view', 'id' => $model->id]));
                }
            ],
            'price:currency',
            [
                'attribute' => 'imageUrl',
                // 'attribute' => 'thumbWizardListUrl', // показываем thumb 'wizard-list' 
                // 'attribute' => 'thumbWizardModalDesktopUrl', // показываем thumb 'wizard-modal-desktop'
                // 'attribute' => 'thumbWizardModalMobileUrl', // показываем thumb 'wizard-modal-mobile'
                'format' => ['image', ['height' => 50]]
            ],
            'description:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>