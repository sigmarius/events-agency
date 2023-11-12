<?php

use yii\helpers\Url;
use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'Home';
?>

<div class="section section-mp-hero1">
    <div class="section-container">
        Events.
    </div>
</div>

<div class="section section-services">
    <div class="section-container">
        <div class="section-title">
            We give an extraordinary service for you
        </div>

        <div class="section-description">
            There is the best thing and only for you
        </div>

        <ul class="services-list">
            <li>
                <?= Html::a('Events', ['/event/select-event'], ['class' => 'events']) ?>
            </li>
        </ul>
    </div>
</div>

<div class="section section-mp-hero2">
    <div class="section-container">
        We Make everything's memorable..
    </div>
</div>

<div class="section section-social">
    <div class="section-container">
        <div class="section-title">
            Let’s get in touch with us
        </div>

        <div class="section-description">
            Anywhere, Anytime
        </div>

        <ul class="social-links">
            <li>
                <a href="" class="instagram">Instagram</a>
            </li>
            <li>
                <a href="" class="facebook">Facebook</a>
            </li>
            <li>
                <a href="" class="whatsapp">WhatsApp</a>
            </li>
        </ul>
    </div>
</div>