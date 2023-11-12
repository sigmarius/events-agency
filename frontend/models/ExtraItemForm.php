<?php

namespace frontend\models;

use common\models\ExtraItem;
use Yii;

/**
 * Class ExtraItemForm
 * 
 * @property string extraItemDetailLabel
 * @property int extraItemTotalPrice
 * @property string extraItemTotalPriceLabel
 */
class ExtraItemForm extends ExtraItem
{
    public $quantity = 0;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'quantity'], 'required'],
            ['id', 'integer'],
            ['quantity', 'integer', 'min' => 0]
        ];
    }

    /**
     * Formats the extraItemForm displayed details
     * 
     * @return string
     */
    public function getExtraItemDetailLabel()
    {
        return $this->title . ' (' . $this->priceLabel . ' x ' . $this->quantity . ')';
    }

    /**
     * Calculates the sum for each value of the extraItemForm
     * 
     * @return int
     */
    public function getExtraItemTotalPrice()
    {
        return $this->price * $this->quantity;
    }

    /**
     * Formats the extraItemForm total price
     * 
     * @return string
     */
    public function getExtraItemTotalPriceLabel()
    {
        return Yii::$app->formatter->asCurrency($this->extraItemTotalPrice);
    }
}
