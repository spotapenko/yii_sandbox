<?php

namespace app\controllers;

use Yii;
use yii\web\NotFoundHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\BookSearch;
use app\models\Book;

/**
 * Class BookController
 *
 * @package app\controllers
 */
class BookController extends Controller
{
    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class'   => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Books models.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BookSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render(
            'index', [
            'searchModel'  => $searchModel,
            'dataProvider' => $dataProvider,
        ]
        );
    }

    /**
     * Displays a single Author model.
     *
     * @param integer $id
     *
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);

        if (Yii::$app->request->isAjax) {
            return $this->renderAjax(
                'ajax_view', [
                'model' => $model
            ]
            );
        }

        return $this->render(
            'view', [
            'model' => $model,
        ]
        );
    }

    /**
     * Creates a new Book model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     *
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Book();

        return $this->processSaveModel($model);
    }

    /**
     * Updates an existing Book model.
     * If update is successful, the browser will be redirected to the 'view' page.
     *
     * @param integer $id
     *
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        return $this->processSaveModel($model);

    }

    /**
     * Deletes an existing Book model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     *
     * @param integer $id
     *
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Book model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param integer $id
     *
     * @return Book the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Book::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(
                'The requested page does not exist.'
            );
        }
    }

    /**
     * @param \app\models\Book $model
     *
     * @return string|\yii\web\Response
     */
    protected function processSaveModel(Book $model)
    {
        if ($model->load(Yii::$app->request->post())) {
            if (!$model->save()) {
                return $this->render(
                    'update', [
                    'model' => $model,
                ]
                );
            }

            return $this->redirect(['index']);
        } else {
            return $this->render(
                'update', [
                'model' => $model,
            ]
            );
        }
    }
}
