<?php

namespace backend\controllers;

use Yii;
use common\models\Table;
use common\models\TableSearch;
use yii\web\NotFoundHttpException;


/**
 * TableController implements the CRUD actions for Table model.
 */
class TableController extends BaseController
{
    /**
     * Lists all Table models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TableSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Table model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => Table::findModel($id),
        ]);
    }

    /**
     * Updates an existing Table model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = Table::findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    
}
