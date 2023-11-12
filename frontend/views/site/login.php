<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = 'Sign In';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="section section-title section-signin-title">
    <div class="section-container">
        <?= Html::encode($this->title); ?>
    </div>
</div>

<div class="section section-signin">
    <div class="section-container">
        <?php $form = ActiveForm::begin([
            'options' => [
                'class' => 'form-wrapper login-form',
                'fieldClass' => 'form-control',
            ],
            'fieldConfig' => [
                'template' => "{input}\n{error}",
            ]
        ]); ?><?= $form->field
        ($model, 'username')->textInput(['placeholder' => "Username"]); ?>
        <?= $form->field($model, 'password')->passwordInput(['placeholder' => "Password"]) ?>
        <div class="row">
            <div class="col-sm-6">
                <?= $form->field($model, 'rememberMe', ['template' => "{label}\n{input}"])->checkbox(['checked' => false])->label('Keep me Sign In') ?>
            </div>
        </div>
        <div class="buttons">
            <?= Html::submitButton('Sign In', ['class' => 'btn btn-lg btn-success', 'name' => 'login-button']) ?>
        </div>
        <div class="reg-link">Didn't have an account yet? <a href="<?= Url::to(['site/signup']); ?>">Register Here</a></div>
        <?php ActiveForm::end(); ?>
    </div>
</div>