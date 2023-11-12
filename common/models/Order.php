<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\helpers\ArrayHelper;
use yii\helpers\VarDumper;
use yii\web\NotFoundHttpException;

/**
 * This is the model class for table "{{%order}}".
 *
 * @property int $id
 * @property int $status
 * @property int $event_id
 * @property int $customer_id
 * @property string $event_date
 * @property string|null $transaction_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property User $customer
 * @property User[] $customersList
 * 
 * @property Event $event
 * @property OrderItem[] $orderItems
 * 
 * @property array $orderStatusesMap
 * @property string $statusName
 * 
 * @property int $orderPrice
 * @property string $orderPriceLabel
 * @property string $orderCssClass
 * 
 * @property Table $table
 * @property bool $hasExtraItems
 * 
 * @property OrderItem[] $orderExtraItems
 * @property string $orderExtraItemsPreviewLabel
 * @property int $orderExtraItemsTotalPrice
 * @property string $orderExtraItemsTotalPriceLabel
 * @property string $transactionIdLabel
 */
class Order extends \yii\db\ActiveRecord
{
    const STATUS_PAYMENT_PENDING = 0;
    const STATUS_PAYMENT_VERIFICATION_PENDING = 1;
    const STATUS_PROCESSING = 2;
    const STATUS_COMPLETE = 3;

    public static function getOrderStatusesMap()
    {
        return [
            self::STATUS_PAYMENT_PENDING => 'Payment Pending',
            self::STATUS_PAYMENT_VERIFICATION_PENDING => 'Payment Verification Pending',
            self::STATUS_PROCESSING => 'Processing Order',
            self::STATUS_COMPLETE => 'Complete'
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%order}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'event_id', 'customer_id', 'event_date'], 'required'],
            [['status', 'event_id', 'customer_id'], 'integer'],
            [['event_date'], 'safe'],
            [['transaction_id'], 'string', 'max' => 255],
            [['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['customer_id' => 'id']],
            [['event_id'], 'exist', 'skipOnError' => true, 'targetClass' => Event::class, 'targetAttribute' => ['event_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status' => 'Status',
            'event_id' => 'Event ID',
            'customer_id' => 'Customer ID',
            'event_date' => 'Event Date',
            'transaction_id' => 'Transaction ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * Gets query for [[Customer]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(User::class, ['id' => 'customer_id']);
    }

    /**
     * Gets query for [[Event]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEvent()
    {
        return $this->hasOne(Event::class, ['id' => 'event_id']);
    }

    /**
     * Gets query for [[OrderItems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderItems()
    {
        return $this->hasMany(OrderItem::class, ['order_id' => 'id']);
    }

    public function getStatusName()
    {
        $statuses = $this->orderStatusesMap;
        return $statuses[$this->status];
    }

    public function getOrderPrice()
    {
        $orderItems = $this->getOrderItems()->asArray()->all();
        return array_reduce($orderItems, function($carry, $item) {
            return $carry += $item['price'] * $item['quantity'];
        }, 0);
    }

    public function getOrderPriceLabel()
    {
        return Yii::$app->formatter->asCurrency($this->orderPrice);
    }

    public function getOrderCssClass()
    {
        switch ($this->status) {
            case self::STATUS_PAYMENT_PENDING:
            case self::STATUS_PAYMENT_VERIFICATION_PENDING:
                return 'pending';
            case self::STATUS_PROCESSING:
                return 'processing';
            case self::STATUS_COMPLETE:
                return 'complete';
        }
    }

    /**
     * Finds Table by $tableId
     * 
     * @return Table
     */
    public function getTable()
    {
        $tableId = $this->getOrderItems()->where(['not', ['table_id' => null]])->one()->table_id;
        return Table::findModel($tableId);
    }

    /**
     * Finds if Order has ExtraItems
     * 
     * @return bool
     */
    public function getHasExtraItems()
    {
        $extraItems = $this->getOrderItems()->where(['table_id' => null])->asArray()->all();
        return count($extraItems) > 0;
    }

    public function getOrderExtraItems()
    {
        return $this->getOrderItems()->where(['table_id' => null])->all();
    }

    /**
     * Formats the orderExtraItems to display no more than 2 elements
     * in template [quantity][name]
     * 
     * @return string
     */
    public function getOrderExtraItemsPreviewLabel()
    {
        $needFiller = false;
        $filler = '...';

        $extraItemPreviews = [];
        foreach ($this->orderExtraItems as $extraItem) {
            $extraItemPreviews[] = $extraItem->quantity . ' ' . $extraItem->title;

            if (count($extraItemPreviews) > 2) {
                $needFiller = true;
                array_pop($extraItemPreviews);
                break;
            }
        }

        return $needFiller 
            ? implode(', ', $extraItemPreviews) . $filler 
            : implode(', ', $extraItemPreviews);
    }

    /**
     * Calculates the orderExtraItems total price
     * 
     * @return int
     */
    public function getOrderExtraItemsTotalPrice()
    {
        return array_reduce($this->orderExtraItems, function ($carry, $item) {
            $carry += $item->price * $item->quantity;
            return $carry;
        }, 0);
    }

    /**
     * Calculates the orderExtraItems total price
     * 
     * @return int
     */
    public function getOrderExtraItemsTotalPriceLabel()
    {
        return Yii::$app->formatter->asCurrency($this->orderExtraItemsTotalPrice);
    }

    /**
     * Formats the eventDate
     * 
     * @return string
     */
    public function getEventDateLabel()
    {
        return Yii::$app->formatter->asDate($this->event_date, 'php:M j, Y');
    }

    public function getTransactionIdLabel()
    {
        return empty($this->transaction_id) ? 'Not enter yet' : $this->transaction_id;
    }

    /**
     * Список пользователей для Html::activeDropDownList
     * @return array
     */
    public function getCustomersList()
    {
        return ArrayHelper::map(User::find()->all(), 'id', 'fullName');
    }

    /**
     * Finds the Order model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Order the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    public static function findOrder($id)
    {
        if (($model = Order::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
