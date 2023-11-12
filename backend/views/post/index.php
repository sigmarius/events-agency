<?php

use common\models\Post;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\helpers\StringHelper;


/* @var $this yii\web\View */
/* @var $searchModel common\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Posts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Post', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'author_id',
                'format' => 'raw',
                'label' => 'Author Full Name',
                'value' => function (Post $model) {
                    return $model->author->fullName;
                }
            ],
            [
                'attribute' => 'title',
                'format' => 'raw', // значение не должно форматироваться, а должно показываться так, как приходит в виджет
                'value' => function (Post $model) {
                    return Html::a($model->title, Url::to(['view', 'id' => $model->id]));
                }
            ],
            [
                'attribute' => 'body',
                'format' => 'html',
                'value' => function (Post $model) {
                    return StringHelper::truncate($model->body, 200);
                }
            ],
            'created_at:datetime',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
