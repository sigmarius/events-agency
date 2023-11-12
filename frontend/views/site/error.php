<?php

/**
* @var yii\web\View $this
* @var string $name
* @var string $message
* @var Exception $exception  
*/

use yii\helpers\Html;

$this->title = $name;
?>

<div class="section section-title section-error-title">
    <div class="section-container">
        <?= Html::encode($this->title); ?>
    </div>
</div>

<div class="section section-error">
    <div class="section-container">
        <h2><?= nl2br(Html::encode($message)); ?></h2>
    </div>
</div>

