<?php

namespace common\models;

use Exception;
use Yii;

/**
 * This is the model class for table "{{%text_block}}".
 *
 * @property string $shortcut
 * @property string|null $text
 */
class TextBlock extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%text_block}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['shortcut'], 'required'],
            [['text'], 'string'],
            [['shortcut'], 'string', 'max' => 255],
            [['shortcut'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'shortcut' => 'Shortcut',
            'text' => 'Text',
        ];
    }

    /**
     * @param string $shortcut
     * @return string
     */
    public static function getTextByShortcut(string $shortcut)
    {
        /**
         * @var TextBlock $model
         */
        $model = self::findOne($shortcut);
        
        if (!$model) {
            // бросаем исключение
            // throw new Exception("TextBlock by shortcut '$shortcut' - not found");

            // логи записываются в frontend/runtime/logs/app.log
            Yii::error("TextBlock by shortcut '$shortcut' - not found");
        }

        return $model->text ?? '';
    }
}
