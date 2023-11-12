<?php
namespace frontend\controllers;

use common\models\Event;
use common\models\Table;
use Yii;
use common\models\User;
use frontend\models\EventOrderForm;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use frontend\components\PageMessageTrait;

/**
 * EventController
 */
class EventController extends Controller
{
    use PageMessageTrait;

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
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'select-event' => ['GET', 'POST'], // first wizard's step
                    //  для корректной работы трейта PageMessageTrait указываем экшены в явном виде
                    // '*' => ['POST'], // for other wizard's steps
                    'number-of-tables' => ['POST'], // for other wizard's steps
                    'select-date' => ['POST'], // for other wizard's steps
                    'extra-items' => ['POST'], // for other wizard's steps
                    'submit-order' => ['POST'], // for other wizard's steps
                ],
            ],
        ];
    }

    public function actionSelectEvent()
    {
        $model = new EventOrderForm();
        // сценарий можно не указывать, он задается в __construct EventOrderForm
        $model->scenario = EventOrderForm::SCENARIO_STEP_1_SELECT_EVENT;
        
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // проверили как работает первый шаг
            // VarDumper::dump($model, 10, true);
            // echo json_encode($model);
            // die();

            $model->scenario = EventOrderForm::SCENARIO_STEP_2_NUMBER_OF_TABLES;
            return $this->render('step-2-number-of-tables', [
                'model' => $model,
                'tables' => Table::find()->all()
            ]);
        }

        return $this->render('step-1-select-event', [
            'model' => $model,
            'events' => Event::find()->all()
        ]);
    }

    /**
     * @return mixed
     */
    public function actionNumberOfTables()
    {
        $model = new EventOrderForm();
        $model->scenario = EventOrderForm::SCENARIO_STEP_2_NUMBER_OF_TABLES;
        
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            /** @var Table $table */
            $table = Table::find()
                ->where(['id' => $model->tableId])
                ->one();

            if ($table->is_custom) {
                return $this->redirect(['site/contact']);
            }

            // проверили как работает второй шаг
            // echo json_encode($model);
            // die();

            $model->scenario = EventOrderForm::SCENARIO_STEP_3_SELECT_DATE;
            return $this->render('step-3-select-date', [
                'model' => $model
            ]);
        }

        return $this->render('step-2-number-of-tables', [
            'model' => $model,
            'tables' => Table::find()->all()
        ]);
    }

    /**
     * @return mixed
     */
    public function actionSelectDate()
    {
        $model = new EventOrderForm();
        $model->scenario = EventOrderForm::SCENARIO_STEP_3_SELECT_DATE;

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // проверили как работает третий шаг
            // echo json_encode($model);
            // die();
            $model->scenario = EventOrderForm::SCENARIO_STEP_4_EXTRA_ITEMS;
            return $this->render('step-4-extra-items', [
                'model' => $model
            ]);
        }

        return $this->render('step-3-select-date', [
            'model' => $model
        ]);
    }

    /**
     * @return mixed
     */
    public function actionExtraItems()
    {
        $model = new EventOrderForm();
        $model->scenario = EventOrderForm::SCENARIO_STEP_4_EXTRA_ITEMS;

        if (
            $model->load(Yii::$app->request->post()) 
            && EventOrderForm::loadMultiple($model->extraItemForms, Yii::$app->request->post())
            && EventOrderForm::validateMultiple($model->extraItemForms)
            && $model->validate()
        ) {
            // проверили как работает четвертый шаг
            // echo $model->extraItemForms[1]->imageUrl;
            // die();
            // echo json_encode($model);
            // die();

            $model->scenario = EventOrderForm::SCENARIO_STEP_5_SUBMIT_ORDER;
            return $this->render('step-5-submit-order', [
                'model' => $model
            ]);
        }

        return $this->render('step-4-extra-items', [
            'model' => $model
        ]);
    }

    /**
     * @return mixed
     */
    public function actionSubmitOrder()
    {
        $model = new EventOrderForm();
        $model->scenario = EventOrderForm::SCENARIO_STEP_5_SUBMIT_ORDER;
        
        if (
            $model->load(Yii::$app->request->post())
            && EventOrderForm::loadMultiple($model->extraItemForms, Yii::$app->request->post())
            && EventOrderForm::validateMultiple($model->extraItemForms)
            && $model->validate()
        ) {
            // проверили как работает пятый шаг
            // echo json_encode($model);
            // die();
            
            $model->submit(Yii::$app->user->id);

            return $this->redirectToSuccessPage(
                'Order has been placed', 
                'Your order has been placed. Please complete the payment transfer and enter the transaction code into the system, this can be done on your profile page.');
        }

        return $this->render('step-5-submit-order', [
            'model' => $model
        ]);
    }
}
