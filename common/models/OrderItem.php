<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%order_item}}".
 *
 * @property int $id
 * @property int $order_id
 * @property string $title
 * @property float $price
 * @property int $quantity
 * @property int|null $extra_item_id
 * @property int|null $table_id
 *
 * @property ExtraItem $extraItem
 * @property Order $order
 * @property Table $table
 * 
 * @property string $extraItemDetailLabel
 * @property int $extraItemPriceLabel
 * 
 * @property string $orderItemType
 * @property int $orderItemId
 */
class OrderItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%order_item}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_id', 'title', 'price', 'quantity'], 'required'],
            [['order_id', 'quantity', 'extra_item_id', 'table_id'], 'integer'],
            [['price'], 'number'],
            [['title'], 'string', 'max' => 255],
            [['extra_item_id'], 'exist', 'skipOnError' => true, 'targetClass' => ExtraItem::class, 'targetAttribute' => ['extra_item_id' => 'id']],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Order::class, 'targetAttribute' => ['order_id' => 'id']],
            [['table_id'], 'exist', 'skipOnError' => true, 'targetClass' => Table::class, 'targetAttribute' => ['table_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => 'Order ID',
            'title' => 'Title',
            'price' => 'Price',
            'quantity' => 'Quantity',
            'extra_item_id' => 'Extra Item ID',
            'table_id' => 'Table ID',
        ];
    }

    /**
     * Gets query for [[ExtraItem]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getExtraItem()
    {
        return $this->hasOne(ExtraItem::class, ['id' => 'extra_item_id']);
    }

    /**
     * Gets query for [[Order]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Order::class, ['id' => 'order_id']);
    }

    /**
     * Gets query for [[Table]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTable()
    {
        return $this->hasOne(Table::class, ['id' => 'table_id']);
    }

    /**
     * Formats the orderExtraItem displayed details
     * 
     * @return string
     */
    public function getExtraItemDetailLabel()
    {
        return $this->title . ' (' . $this->extraItem->priceLabel . ' x ' . $this->quantity . ')';
    }

    public function getExtraItemPriceLabel()
    {
        $extraItemSum = $this->price * $this->quantity;
        return Yii::$app->formatter->asCurrency($extraItemSum);
    }
    
    public function getOrderItemType()
    {
        return !empty($this->table_id) ? 'Table' : 'Extra Item';
    }

    public function getOrderItemId()
    {
        return !empty($this->table_id) ? $this->table_id : $this->extra_item_id;
    }
}
