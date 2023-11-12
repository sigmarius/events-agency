<?php

/**
 *  @var yii\web\View $this
 * @var string $title
 * @var string $description
*/

use yii\helpers\Html;

$this->title = $title;
?>

<div class="section section-title section-success-title">
    <div class="section-container">
        <?= Html::encode($this->title); ?>
    </div>
</div>

<div class="section section-success">
    <div class="section-container">
        <h2><?= $description; ?></h2>
    </div>
</div>