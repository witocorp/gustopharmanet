<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Archivos;
use frontend\models\ArchivosSearch;
use frontend\models\Carpetas;
use frontend\models\CarpetasSearch;
use frontend\models\ProductosSearch;
use frontend\models\MarcasSearch;
use frontend\models\Paisusuario;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
/**
 * ArchivosController implements the CRUD actions for Archivos model.
 */
class ArchivosController extends Controller
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
			'access' => [
				'class' => AccessControl::className(),
				'only' => ['index', 'jpson', 'download'],
				'rules' => [
					// allow authenticated users
					[
						'allow' => true,
						'roles' => ['@'],
					],
					// everything else is denied
				],
			],
        ];
    }

    /**
     * Lists all Archivos models.
     * @return mixed
     */
    public function actionIndex()
    {
	    if(Yii::$app->request->get('id')){
	       	$session = Yii::$app->session;
			$carpeta = Yii::$app->request->get('id');
	        $searchModel = new ArchivosSearch(['idCarpeta' => $carpeta,]);
	        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
			$searchCarpetas = new CarpetasSearch(['id' => $carpeta,]);
			$carpetasProvider = $searchCarpetas->search(Yii::$app->request->queryParams);
			foreach($carpetasProvider->getModels() as $dato):
				$session['nombreCarpeta'] = $dato->nombre;
				$session['idCarpeta'] = $dato->id;
			endforeach;
			$searchProductos = new ProductosSearch(['id' => $carpetasProvider->getModels()[0]->idProducto]);
			$productosProvider = $searchProductos->search(Yii::$app->request->queryParams);
			$searchMarcas = new MarcasSearch(['id' => $productosProvider->getModels()[0]->idMarca]);
			$marcasProvider = $searchMarcas->search(Yii::$app->request->queryParams);
			
			$query = Paisusuario::find()->where(['usuario'=>Yii::$app->user->getId()]);
			$pArr=array();
			foreach ($query->each() as $data) {
				$pArr[] = $data->pais;
			}
			if(in_array($marcasProvider->getModels()[0]->pais, $pArr)){
				$model = new Archivos();
		        return $this->render('index', [
					'carpetaId' => $carpeta,
		            'searchModel' => $searchModel,
					'model' => $model,
		            'dataProvider' => $dataProvider,
		        ]);
			}else{
				return $this->redirect(array('site/index'));
			}
		}else{
				return $this->redirect(array('site/index'));
		}
    }
	public function actionDownload() {
	   
		return \Yii::$app->response->sendFile('../../'.Yii::$app->request->get('url'))->send();
	}
	public function actionJpson()
    {
		\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		$carpeta = Yii::$app->request->get('id');	
        $searchModel = new ArchivosSearch(['idCarpeta' => $carpeta,]);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		$datos = array();
		foreach($dataProvider->getModels() as $dato):
			$datos[] = $dato;
		endforeach;
		return $datos;
    }
  

    /**
     * Finds the Archivos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Archivos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Archivos::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
