<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%extra_item}}".
 *
 * @property int $id
 * @property string $title
 * @property float $price
 * @property string $image
 * @property string $description
 * 
 * @method getUploadUrl($attribute) - Returns file path for the attribute. 
 * @see \mohorev\file\UploadBehavior
 * @property string imageUrl
 * 
 * @method getThumbUploadUrl($attribute, $profile = 'thumb') - Returns file path for the attribute. 
 * @see \mohorev\file\UploadImageBehavior
 * @property string thumbWizardListUrl
 * @property string thumbWizardModalDesktopUrl
 * @property string thumbWizardModalMobileUrl
 * 
 * @property string priceLabel
 */

class ExtraItem extends \yii\db\ActiveRecord
{
    const SCENARIO_INSERT = 'insert';
    const SCENARIO_UPDATE = 'update';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%extra_item}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'price', 'description'], 'required'],
            [['price'], 'number'],
            [['description'], 'string'],
            [['title'], 'string', 'max' => 255],
            [['image'], 'required', 'on' => self::SCENARIO_INSERT],
            [
                'image', 
                'image', 
                'extensions' => 'jpg, jpeg, png',
                'on' => [self::SCENARIO_INSERT, self::SCENARIO_UPDATE]
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'price' => 'Price',
            'image' => 'Image',
            'description' => 'Description',
        ];
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => \mohorev\file\UploadImageBehavior::class,
                'attribute' => 'image',
                'scenarios' => [self::SCENARIO_INSERT, self::SCENARIO_UPDATE],
                'path' => '@frontend/web/upload/extra-item/{id}',
                'url' => '@frontendUrl/upload/extra-item/{id}',
                'thumbs' => [
                    'wizard-list' => ['width' => 240, 'height' => 282, 'mode' => \Imagine\Image\ManipulatorInterface::THUMBNAIL_OUTBOUND],
                    'wizard-modal-desktop' => ['width' => 483, 'height' => 789, 'mode' => \Imagine\Image\ManipulatorInterface::THUMBNAIL_OUTBOUND],
                    'wizard-modal-mobile' => ['width' => 600, 'height' => 483, 'mode' => \Imagine\Image\ManipulatorInterface::THUMBNAIL_OUTBOUND]
                ],
            ],
        ];
    }

    /**
     * @return string
     */
    public function getImageUrl()
    {
        return $this->getUploadUrl('image');
    }

    /**
     * @return string
     */
    public function getThumbWizardListUrl()
    {
        return $this->getThumbUploadUrl('image', 'wizard-list');
    }

    /**
     * @return string
     */
    public function getThumbWizardModalDesktopUrl()
    {
        return $this->getThumbUploadUrl('image', 'wizard-modal-desktop');
    }

    /**
     * @return string
     */
    public function getThumbWizardModalMobileUrl()
    {
        return $this->getThumbUploadUrl('image', 'wizard-modal-mobile');
    }

    /**
     * @return string
     */
    public function getPriceLabel()
    {
        return Yii::$app->formatter->asCurrency($this->price);
    }
}
