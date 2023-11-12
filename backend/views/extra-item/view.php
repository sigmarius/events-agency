<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ExtraItem */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Extra Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="extra-item-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'price',
            [
                'attribute' => 'imageUrl',
                // 'attribute' => 'thumbWizardListUrl', // показываем thumb 'wizard-list' 
                // 'attribute' => 'thumbWizardModalDesktopUrl', // показываем thumb 'wizard-modal-desktop'
                // 'attribute' => 'thumbWizardModalMobileUrl', // показываем thumb 'wizard-modal-mobile'
                'format' => ['image', ['height' => 200]]
            ],
            'description:ntext',
        ],
    ]) ?>

</div>
