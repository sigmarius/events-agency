<?php

use yii\helpers\Html;
use yii\helpers\VarDumper;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this 
 * @var EventOrderForm $model
 */

$this->title = 'Events';
?>

<?php $this->beginContent('@frontend/views/event/base.php', ['stepNumber' => $model->stepNumber]); ?>

<?php $form = ActiveForm::begin(['action' => ['event/extra-items']]); ?>
<ul class="extra-items-list">
    <?php foreach ($model->extraItemForms as $extraItemForm) : ?>
        <li>
            <div class="inner">
                <div class="img">
                    <?= Html::img($extraItemForm->thumbWizardListUrl); ?>
                </div>
                <span><?= $extraItemForm->title; ?></span>
                <span class="price"><?= $extraItemForm->priceLabel; ?></span>

                <div class="buttons">
                    <?= Html::a('Detail', '#', [
                        'data-toggle' => 'modal',
                        'data-target' => '#extraItemsDetailId' . $extraItemForm->id
                    ]); ?>
                </div>
            </div>
        </li>
    <?php endforeach; ?>
</ul>

<?php foreach ($model->extraItemForms as $index => $extraItemForm) : ?>
    <div class="modal fade modal-presentation" tabindex="-1" role="dialog" id="<?= 'extraItemsDetailId' . $extraItemForm->id; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <a href="#" class="close-modal" data-dismiss="modal" aria-label="Close"></a>
                <div class="modal-body">
                    <div class="presentation-wrapper">
                        <div class="img">
                            <?= Html::img($extraItemForm->thumbWizardModalDesktopUrl, ['class' => 'desktop-image']); ?>
                            <?= Html::img($extraItemForm->thumbWizardModalMobileUrl, ['class' => 'mobile-image']); ?>
                        </div>

                        <div class="description-wrapper">
                            <div class="description-container">
                                <div class="header">
                                    <?= Html::tag('div', $extraItemForm->title, ['class' => 'title']); ?>

                                    <div class="controls">
                                        <?= Html::tag('div', $extraItemForm->priceLabel, ['class' => 'price']); ?>

                                        <?= $form->field($extraItemForm, "[{$index}]id")->hiddenInput()->label(false); ?>

                                        <?= $plusBtn = Html::a('', '#', ['class' => 'control-button plus']); ?>
                                        <?= $minusBtn = Html::a('', '#', ['class' => 'control-button minus']); ?>

                                        <?= $form->field($extraItemForm, "[{$index}]quantity", [
                                            'template' => "{label}\n{input}\n{$plusBtn}\n{$minusBtn}\n{hint}\n{error}"
                                        ])->input('text', ['readonly' => true])->label(false); ?>
                                    </div>
                                </div>

                                <div class="description">
                                    <div class="title">Description</div>

                                    <div class="content">
                                        <?= Html::tag('p', $extraItemForm->description); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<?= $form->field($model, 'eventId')->hiddenInput()->label(false); ?>
<?= $form->field($model, 'tableId')->hiddenInput()->label(false); ?>
<?= $form->field($model, 'eventDate')->hiddenInput()->label(false); ?>

<div class="buttons">
    <?= Html::submitButton('Next', ['class' => 'btn btn-lg btn-success']) ?>
</div>
<?php ActiveForm::end(); ?>

<?php $this->endContent(); ?>