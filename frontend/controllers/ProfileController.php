<?php

namespace frontend\controllers;

use Yii;
use common\models\User;
use common\models\Order;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;

/**
 * ProfileController
 */
class ProfileController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Displays Profile index page.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $this->view->params['userDetailTitle'] = 'User Detail';
        $user = User::findModel(Yii::$app->user->identity->getId());

        $orderDataProvider = new ActiveDataProvider();
        $orderDataProvider->query = Order::find()->where(['customer_id' => Yii::$app->user->id])->limit(20);
        $orderDataProvider->sort->defaultOrder = ['created_at' => SORT_DESC];
        $orderDataProvider->pagination = false;

        return $this->render('index', compact('user', 'orderDataProvider'));
    }

    /**
     * Displays Profile edit page.
     *
     * @return mixed
     */
    public function actionEdit()
    {
        /** @var User $model */
        $model = Yii::$app->user->identity;

        // активировали свой сценарий для модели
        $model->scenario = User::SCENARIO_PROFILE_EDIT;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['profile/index']);
        }

        return $this->render('edit', compact('model'));
    }

    /**
     * Displays a single Order model
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionOrderDetails($id)
    {
        $model = Order::findOrder($id);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->status = Order::STATUS_PAYMENT_VERIFICATION_PENDING;
            $model->save();
        }

        return $this->render('order-details', compact('model'));
    }
}
