<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\StringHelper;

/**
 * @var yii\web\View $this 
 * @var common\models\Post $posts 
 */

$this->title = 'Blog';
?>

<div class="section section-title section-blog-title">
    <div class="section-container">
        <?= Html::encode($this->title) ?>
    </div>
</div>

<div class="section section-content">
    <div class="section-container">
        <div class="section-title">
            <?= Html::encode($this->params['subTitle']) ?>
        </div>

        <div class="section-text">
            <?php foreach ($posts as $idx => $post) : ?>
                <div class="media">
                    <div class="media-body">
                        <a href="<?= Url::to(['blog/view', 'id' => $post->id]); ?>">
                            <h4 class="media-heading"><?= Html::encode($post->title); ?></h4>
                        </a>
                        <h6>
                            <?= $post->postSubtitleInfo; ?>
                        </h6>
                        <?= StringHelper::truncate(Html::encode($post->body), 500); ?>
                    </div>
                </div>

                <?php if ($idx < count($posts) - 1) : ?>
                    <hr>
                <?php endif; ?>
                
            <?php endforeach; ?>
        </div>
    </div>
</div>