<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="section section-title section-contact-title">
    <div class="section-container">
        <?= Html::encode($this->title) ?>
    </div>
</div>

<div class="section section-contact">
    <div class="section-container">
        <div class="section-title">
            Let’s get in touch with us
        </div>
        <div class="section-description">
            We reply as fast as light do
        </div>

        <?php $form = ActiveForm::begin([
            'options' => [
                'class' => 'form-wrapper contact-form',
                'fieldClass' => 'form-control',
            ],
            'fieldConfig' => [
                'template' => "{input}\n{error}",
                'options' => [
                    'class' => 'form-group required',
                ],
            ]
        ]); ?>
            <?= $form->field($model, 'name')->textInput(['placeholder' => "Full Name"]); ?>
            <div class="row">
                <div class="col-sm-7">
                    <?= $form->field($model, 'email')->input('email', ['placeholder' => "Email"]); ?>
                </div>
                <div class="col-sm-5">
                    <?= $form->field($model, 'subject')->textInput(['placeholder' => "Subject"]); ?>
                </div>
            </div>
            <?= $form->field($model, 'body')->textarea(['rows' => 6, 'cols' => 30, 'placeholder' => "Message"]) ?>
            <div class="buttons">
                <?= Html::submitButton('Send', ['class' => 'btn btn-lg btn-success']) ?>
            </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>