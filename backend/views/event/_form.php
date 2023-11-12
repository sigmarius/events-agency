<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;

/* @var $this yii\web\View */
/* @var $model common\models\Event */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="event-form">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    ($model, 'name')->textInput(['maxlength' => true]) ?<?= $form->field>

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

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-block']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>