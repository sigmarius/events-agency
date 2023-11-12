<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this 
 * @var common\models\Post $post
 */
$this->title = Html::encode($post->title);
?>

<div class="section section-content">
    <div class="section-container">
        <div class="section-title">
            <?= Html::encode($post->title); ?>
        </div>

        <div class="section-text">
            <h5><?= $post->postSubtitleInfo; ?></h5>
            <?= Html::encode($post->body); ?>
        </div>
    </div>
</div>
