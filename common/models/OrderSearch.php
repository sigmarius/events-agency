<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Order;
use yii\helpers\ArrayHelper;

/**
 * OrderSearch represents the model behind the search form of `common\models\Order`.
 * 
 *  @property User[] $customersList
 */
class OrderSearch extends Order
{
    /**
     * Используется виджетом DateRangePicker
     * @var string
     */
    public $eventDateRange;

    /**
     * Используется виджетом DateRangePicker
     * @var string
     */
    public $eventDateStart;

    /**
     * Используется виджетом DateRangePicker
     * @var string
     */
    public $eventDateEnd;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status', 'event_id', 'customer_id'], 'integer'],
            [['event_date', 'transaction_id', 'created_at', 'updated_at', 'eventDateRange', 'eventDateStart', 'eventDateEnd'], 'safe'],

            // для более строгой валидации на фронте
            // ['eventDateRange', 'match', 'pattern' => '/^.+\s\-\s.+$/'],
            // [['eventDateStart', 'eventDateEnd'], 'date', 'format' => 'php:Y-m-d'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Order::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['created_at' => SORT_DESC]]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'status' => $this->status,
            'event_id' => $this->event_id,
            'customer_id' => $this->customer_id,
            'event_date' => $this->event_date,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        // добавили для DateRangePicker
        // ограничения добавляются только если eventDateStart и eventDateEnd заполнены
        $query->andFilterCompare('event_date', $this->eventDateStart, '>=');
        $query->andFilterCompare('event_date', $this->eventDateEnd, '<=');

        $query->andFilterWhere(['like', 'transaction_id', $this->transaction_id]);

        return $dataProvider;
    }
}
