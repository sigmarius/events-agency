<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%event}}".
 *
 * @property int $id
 * @property string $name
 * @property string $image
 * 
 * @method getUploadUrl($attribute) - Returns file path for the attribute. 
 * @see \mohorev\file\UploadBehavior
 * 
 * @property string imageUrl
 */
class Event extends \yii\db\ActiveRecord
{
    const SCENARIO_INSERT = 'insert';
    const SCENARIO_UPDATE = 'update';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%event}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['name'], 'unique'],
            [['image'], 'required', 'on' => self::SCENARIO_INSERT],
            [
                'image', 
                'image', 
                'extensions' => 'jpg, jpeg, png',
                'minHeight' => 282,
                'maxHeight' => 282,
                'minWidth' => 240,
                'maxWidth' => 240,
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
            'name' => 'Name',
            'image' => 'Image',
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
                // какую картинку использовать, если нет загруженной картинки
                // 'placeholder' => '@app/modules/user/assets/images/userpic.jpg',
                'path' => '@frontend/web/upload/event/{id}',
                'url' => '@frontendUrl/upload/event/{id}',
                'createThumbsOnSave' => false, // отключили создание превью картинки
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
}
