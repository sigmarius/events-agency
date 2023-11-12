<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\number\NumberControl;
use kartik\widgets\FileInput;

/* @var $this yii\web\View */
/* @var $model common\models\ExtraItem */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="extra-item-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'price')->widget(NumberControl::classname(), [
                'maskedInputOptions' => [
                    'prefix' => '$ ',
                    'allowMinus' => false
                ]
            ]); ?>

            <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-block']) ?>
            </div>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'image')->widget(\kartik\file\FileInput::class, [
                'options' => [
                    'accept' => 'image/*',
                    'multiple' => false
                ],
                'pluginOptions' => [
                    'showCaption' => false,
                    'showRemove' => false,
                    'showUpload' => false,
                    'browseClass' => 'btn btn-primary btn-block',
                    'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
                    'browseLabel' =>  'Select Photo',
                    'initialPreview' => $model->image ? $model->imageUrl : false,
                    'initialPreviewAsData' => true,
                    'initialPreviewConfig' => $model->image ? [['caption' => $model->image]] : []
                ]
            ]) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>