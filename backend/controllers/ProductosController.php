<?php

namespace backend\controllers;

use Yii;
use backend\models\Productos;
use backend\models\ProductosSearch;
use backend\models\Carpetas;
use backend\models\Marcas;
use backend\models\MarcasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ProductosController implements the CRUD actions for Productos model.
 */
class ProductosController extends Controller
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
     * Lists all Productos models.
     * @return mixed
     */
    public function actionIndex()
    {
		$session = Yii::$app->session;
		$marca = Yii::$app->request->get('id');
        $searchModel = new ProductosSearch(['idMarca' => $marca,]);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		$searchMarcas = new MarcasSearch(['id' => $marca,]);
		$marcasProvider = $searchMarcas->search(Yii::$app->request->queryParams);
		$nombremarca = "";
		foreach($marcasProvider->getModels() as $dato):
			$session['nombreMarca'] = $dato->marca;
			$session['idMarca'] = $dato->id;
		endforeach;
		$model = new Productos();
        return $this->render('index', [
			'idMarca' => $marca,
            'searchModel' => $searchModel,
			'model' => $model,
            'dataProvider' => $dataProvider,
        ]);
    }
	public function actionJpson()
    {
		\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		$marca = Yii::$app->request->get('id');	
        $searchModel = new ProductosSearch(['idMarca' => $marca,]);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		$datos = array();
		foreach($dataProvider->getModels() as $dato):
			$datos[] = $dato;
		endforeach;
		return $datos;
    }
    /**
     * Displays a single Productos model.
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
     * Creates a new Productos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Productos();

        if ($model->load(Yii::$app->request->post())) {
            $model->file= UploadedFile::getInstance($model, 'file');
			$nombreImage = 'protected/img/'.date("YmdHis").'.'.$model->file->extension;
			$model->file->saveAs('../../'.$nombreImage);
			$model->url=$nombreImage;
			$model->save();
			$carpetasAr = array('LABELS', 'MOCKUPS','MARKETING' ,'REGISTRO');
			for($i=0; $i<4; $i++){
				$carpeta = new Carpetas();
				$carpeta->idProducto = $model->id;
				$carpeta->nombre = $carpetasAr[$i];
				$carpeta->save();
			}
            return $this->redirect(['index', 'id' => $model->idMarca]);
        }

        return $this->render('create', [
			'marcaId' => Yii::$app->request->get('id'),
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Productos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */

	public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            if(Yii::$app->request->post('chDe')){
                $model->file='[_attributes:yii\db\BaseActiveRecord:private]';
                $model->url='protected/img/pixel.png';
                $model->save();
            }
            else{
                $model->file= UploadedFile::getInstance($model, 'fileup');
       if(isset($model->file->extension)){
        $nombreImage = 'protected/img/'.date("YmdHis").'.'.$model->file->extension;
        $model->file->saveAs('../../'.$nombreImage);
        $model->url=$nombreImage;    
       }else{
                    $model->file='[_attributes:yii\db\BaseActiveRecord:private]';
                }
            }
   $model->save();
            return $this->redirect(['index', 'id' => $model->idMarca]);
        }

        return $this->render('update', [
   'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Productos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $producto = $this->findModel($id);
        $marcaid = $producto->idMarca;
        unlink('../../'.$producto->url);
        $producto->delete();
        return $this->redirect(['index', 'id' => $marcaid]);
    }

    /**
     * Finds the Productos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Productos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Productos::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
