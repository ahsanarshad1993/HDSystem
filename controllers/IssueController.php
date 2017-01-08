<?php

namespace app\controllers;

use Yii;
use app\models\Issue;
use app\models\IssueSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * IssueController implements the CRUD actions for Issue model.
 */
class IssueController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Issue models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new IssueSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Issue model.
     * @param integer $issue_id
     * @param integer $engineer_id
     * @return mixed
     */
    public function actionView($issue_id, $engineer_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($issue_id, $engineer_id),
        ]);
    }

    /**
     * Creates a new Issue model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Issue();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'issue_id' => $model->issue_id, 'engineer_id' => $model->engineer_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Issue model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $issue_id
     * @param integer $engineer_id
     * @return mixed
     */
    public function actionUpdate($issue_id, $engineer_id)
    {
        $model = $this->findModel($issue_id, $engineer_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'issue_id' => $model->issue_id, 'engineer_id' => $model->engineer_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Issue model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $issue_id
     * @param integer $engineer_id
     * @return mixed
     */
    public function actionDelete($issue_id, $engineer_id)
    {
        $this->findModel($issue_id, $engineer_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Issue model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $issue_id
     * @param integer $engineer_id
     * @return Issue the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($issue_id, $engineer_id)
    {
        if (($model = Issue::findOne(['issue_id' => $issue_id, 'engineer_id' => $engineer_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
