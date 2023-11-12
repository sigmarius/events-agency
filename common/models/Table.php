<?php

namespace common\models;

use Yii;
use yii\web\NotFoundHttpException;

/**
 * This is the model class for table "{{%table}}".
 *
 * @property int $id
 * @property string $title
 * @property string|null $subtitle
 * @property float $price
 * @property int $is_custom
 * 
 * @property string priceLabel
 * @property string fullTableNameLabel
 */
class Table extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%table}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'price'], 'required'],
            [['price'], 'number'],
            [['is_custom'], 'integer'],
            [['title', 'subtitle'], 'string', 'max' => 255],
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
            'subtitle' => 'Subtitle',
            'price' => 'Price',
            'is_custom' => 'Is Custom',
        ];
    }

    /**
     * @return string
     */
    public function getPriceLabel()
    {
        return Yii::$app->formatter->asCurrency($this->price);
    }

    /**
     * @return string
     */
    public function getFullTableNameLabel()
    {
        return $this->title . ' ' . $this->subtitle;
    }

    /**
     * Finds the Table model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Table the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    public static function findModel($id)
    {
        if (($model = self::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
