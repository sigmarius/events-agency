<?php

namespace frontend\models;

use common\models\Event;
use common\models\ExtraItem;
use common\models\Order;
use common\models\OrderItem;
use common\models\Table;
use Exception;
use LogicException;
use yii\base\Model;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\VarDumper;
use yii\db\Transaction;

/**
 * Class EventOrderForm
 * 
 * @property int $stepNumber @see frontend/views/event/base.php 
 * 
 * @property Event $event
 * @property Table $table
 * @property string eventDateLabel
 * 
 * @property bool hasExtraItems
 * @property string extraItemsPreviewLabel
 * @property int extraItemsTotalPrice
 * @property string extraItemsTotalPriceLabel
 * 
 * @property string eventTotalPriceLabel
 * @property ExtraItemForm[] $nonZeroQuantityExtraItemForms
 * 
 */

class EventOrderForm extends Model
{
    /**
     * @var int
     */
    public $eventId;

    /**
     * @var int
     */
    public $tableId;

    /**
     * @var string
     */
    public $eventDate;

    /**
     * @var ExtraItemForm[]
     */
    public $extraItemForms;

    const SCENARIO_STEP_1_SELECT_EVENT = 'select-event';
    const SCENARIO_STEP_2_NUMBER_OF_TABLES = 'number-of-tables';
    const SCENARIO_STEP_3_SELECT_DATE = 'select-date';
    const SCENARIO_STEP_4_EXTRA_ITEMS = 'extra-items';
    const SCENARIO_STEP_5_SUBMIT_ORDER = 'submit-order';

    /**
     * {@inheritdoc}
     */
    public function __construct($config = ['scenario' => self::SCENARIO_STEP_1_SELECT_EVENT])
    {
        parent::__construct($config);
        $this->extraItemForms = ExtraItemForm::find()->all();
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['eventId', 'required', 'message' => 'Please, choose event.'],
            ['eventId', 'integer'],
            ['eventId', 'exist', 'skipOnError' => true, 'targetClass' => Event::class, 'targetAttribute' => ['eventId' => 'id']],
            [
                'tableId', 
                'required', 
                'message' => 'Please, choose one of the types of tables.',
                'on' => self::SCENARIO_STEP_2_NUMBER_OF_TABLES
            ],
            ['tableId', 'integer', 'on' => self::SCENARIO_STEP_2_NUMBER_OF_TABLES],
            [
                'tableId', 
                'exist', 
                'skipOnError' => true, 
                'targetClass' => Table::class, 'targetAttribute' => ['tableId' => 'id'],
                'on' => self::SCENARIO_STEP_2_NUMBER_OF_TABLES
            ],
            [
                'eventDate', 
                'required', 
                'message' => 'Please, choose event date.',
            ],
            [
                'eventDate', 
                'date', 
                'format' => 'php:Y-m-d', 
                'min' => date('Y-m-d', strtotime('+3 days')),
            ]
        ];
    }

    /**
     * @return array
     */
    public function scenarios()
    {
        return [
            static::SCENARIO_STEP_1_SELECT_EVENT => ['eventId'],
            static::SCENARIO_STEP_2_NUMBER_OF_TABLES => ['eventId', 'tableId'],
            static::SCENARIO_STEP_3_SELECT_DATE => ['eventId', 'tableId', 'eventDate'],
            static::SCENARIO_STEP_4_EXTRA_ITEMS => ['eventId', 'tableId', 'eventDate', 'extraItemForms'],
            static::SCENARIO_STEP_5_SUBMIT_ORDER => ['eventId', 'tableId', 'eventDate', 'extraItemForms'],
        ];
    }

    /**
     * Returns the current step number
     * 
     * Function logic based on current scenarious
     * Steps begin from "1"
     * 
     * @return int
     */
    public function getStepNumber()
    {
        $result = array_search($this->scenario, array_keys($this->scenarios()));

        return $result === false ? 1 : $result + 1;
    }

    /**
     * Finds model Event by eventId
     * 
     * @return Event
     */
    public function getEvent()
    {
        return Event::findOne($this->eventId);
    }

    /**
     * Finds model Table by tableId
     * 
     * @return Table
     */
    public function getTable()
    {
        return Table::findOne($this->tableId);
    }

    /**
     * Formats the eventDate
     * 
     * @return string
     */
    public function getEventDateLabel()
    {
        return Yii::$app->formatter->asDate($this->eventDate, 'php:M j, Y');
    }

    /**
     * Check if extraItemForms contains not null value
     * 
     * @return bool
     */
    public function getHasExtraItems()
    {
        return max(ArrayHelper::map($this->extraItemForms, 'id', 'quantity')) > 0;
    }

    /**
     * Formats the extraItemForms to display no more than 2 elements
     * in template [quantity][name]
     * 
     * @return string
     */
    public function getExtraItemsPreviewLabel()
    {
        $needFiller = false;
        $filler = '...';

        $extraItemPreviews = [];
        foreach ($this->extraItemForms as $extraItem) {
            if ((int)$extraItem->quantity !== 0) {
                $extraItemPreviews[] = $extraItem->quantity . ' ' . $extraItem->title;
            }

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
     * Calculates the extraItemForms total price
     * 
     * @return int
     */
    public function getExtraItemsTotalPrice()
    {
        return array_reduce($this->extraItemForms, function ($carry, $item) {
            $carry += $item->extraItemTotalPrice;
            return $carry;
        }, 0);
    }

    /**
     * Formats the extraItemForms total price
     * 
     * @return string
     */
    public function getExtraItemsTotalPriceLabel()
    {
        return Yii::$app->formatter->asCurrency($this->extraItemsTotalPrice);
    }

    /**
     * Formats the eventOprderForm total price
     * 
     * @return string
     */
    public function getEventTotalPriceLabel()
    {
        $total = $this->table->price + $this->extraItemsTotalPrice;
        return Yii::$app->formatter->asCurrency($total);
    }

    /**
     * @return ExtraItemForm[]
     */
    public function getNonZeroQuantityExtraItemForms()
    {
        return array_filter(
            $this->extraItemForms,
            function (ExtraItemForm $item) {
                return $item->quantity > 0;
            }
        );
    }

    /**
     * Передаем $customerId, чтобы сделать меньше связанность формы,
     * например, заказ может оформляться через оператора, 
     * который будет выбирать клиента со своим id 
     */
    public function submit(int $customerId)
    {
        // перед началом выполнения всех действий создаем объект транзакции
        $transaction = Yii::$app->db->beginTransaction();

        try {
            $order = new Order();
            $order->status = Order::STATUS_PAYMENT_PENDING;
            $order->event_id = (int)$this->eventId;
            $order->customer_id = $customerId;
            $order->event_date = $this->eventDate;

            if (!$order->save()) {
                Yii::error($order->getErrors());
                throw new LogicException('Internal error');
            }

            foreach ($this->nonZeroQuantityExtraItemForms as $extraItemForm) {
                $orderItem = new OrderItem();
                $orderItem->order_id  = $order->id;
                $orderItem->title = $extraItemForm->title;
                $orderItem->price = $extraItemForm->price;
                $orderItem->quantity = $extraItemForm->quantity;
                $orderItem->extra_item_id = $extraItemForm->id;

                if (!$orderItem->save()) {
                    Yii::error($orderItem->getErrors());
                    throw new LogicException('Internal error');
                }
            }

            // сохраняем идентификатор стола как отдельный $orderItem 
            // чтобы в дальнейшем было удобнее масштабировать приложение
            $orderItem = new OrderItem();
            $orderItem->order_id  = $order->id;
            $orderItem->table_id  = $this->tableId;
            $orderItem->title  = $this->table->fullTableNameLabel;
            $orderItem->price  = $this->table->price;
            $orderItem->quantity = 1;

            if (!$orderItem->save()) {
                Yii::error($orderItem->getErrors());
                throw new LogicException('Internal error');
            }

            // после выполнения всех необходимых действий завершаем транзакцию
            $transaction->commit();
        } catch (\Exception $e) {
            // если возникла ошибка, откатываем транзакцию
            $transaction->rollBack();
            throw $e; // бросаем полученное исключение
        }
        
    }


}
