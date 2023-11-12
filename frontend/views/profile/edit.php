<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\StringHelper;
use yii\helpers\VarDumper;
use yii\bootstrap\ActiveForm;

/**
 * @var yii\web\View $this 
 * @var common\models\User $model
 */
$this->title = 'Edit Profile';
?>

<div class="section section-profile">
    <div class="section-container">
        <div class="profile-edit-wrapper">
            <div class="block-title">
                <?= Html::encode($this->title) ?>
            </div>

            <?php $form = ActiveForm::begin([
                'options' => [
                    'class' => 'form-wrapper',
                    'fieldClass' => 'form-control',
                ],
                'fieldConfig' => [
                    'template' => "{label}\n{input}\n{error}",
                    'labelOptions' => [
                        'class' => 'control-label'
                    ],
                ]
            ]); ?>
            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'first_name')->textInput(); ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'last_name')->textInput(); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'city')->textInput(); ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'address')->textInput(); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?= $form->field($model, 'phone')->textInput(); ?>
                </div>
            </div>
            <div class="buttons">
                <?= Html::submitButton('Save', ['class' => 'btn btn-lg btn-success']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>