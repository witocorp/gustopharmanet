<?php

namespace backend\controllers;

use Yii;
use backend\models\Carpetas;
use backend\models\CarpetasSearch;
use backend\models\Productos;
use backend\models\ProductosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CarpetasController implements the CRUD actions for Carpetas model.
 */
class CarpetasController extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lists all Carpetas models.
     * @return mixed
     */
    public function actionIndex()
    {
		$session = Yii::$app->session;
		$producto = Yii::$app->request->get('id');
        $searchModel = new CarpetasSearch(['idProducto' => $producto,]);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		$searchProductos = new ProductosSearch(['id' => $producto,]);
		$productosProvider = $searchProductos->search(Yii::$app->request->queryParams);
		foreach($productosProvider->getModels() as $dato):
			$session['nombreProducto'] = $dato->producto;
			$session['idProducto'] = $dato->id;
		endforeach;
		$model = new Carpetas();
        return $this->render('index', [
			'productoId' => $producto,
            'searchModel' => $searchModel,
			'model' => $model,
            'dataProvider' => $dataProvider,
        ]);
    }
	public function actionJpson()
    {
		\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		$producto = Yii::$app->request->get('id');	
        $searchModel = new CarpetasSearch(['idProducto' => $producto,]);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		$datos = array();
		foreach($dataProvider->getModels() as $dato):
			$datos[] = $dato;
		endforeach;
		return $datos;
    }
    /**
     * Displays a single Carpetas model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Carpetas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Carpetas();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
			return $this->redirect(['index', 'id' => $model->idProducto]);
        }

        return $this->render('create', [
			'productoId' => Yii::$app->request->get('id'),
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Carpetas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
           return $this->redirect(['index', 'id' => $model->idProducto]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Carpetas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Carpetas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Carpetas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Carpetas::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
