<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Carpetas;
use frontend\models\CarpetasSearch;
use frontend\models\Productos;
use frontend\models\ProductosSearch;
use frontend\models\MarcasSearch;
use frontend\models\Paisusuario;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

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
			'access' => [
				'class' => AccessControl::className(),
				'only' => ['index', 'jpson'],
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
     * Lists all Carpetas models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->request->get('id')){    
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

            $searchMarcas = new MarcasSearch(['id' => $productosProvider->getModels()[0]->idMarca]);
            $marcasProvider = $searchMarcas->search(Yii::$app->request->queryParams);
            
            $query = Paisusuario::find()->where(['usuario'=>Yii::$app->user->getId()]);
            $pArr=array();
            foreach ($query->each() as $data) {
                $pArr[] = $data->pais;
            }
            if(in_array($marcasProvider->getModels()[0]->pais, $pArr)){
        		$model = new Carpetas();
                return $this->render('index', [
        			'productoId' => $producto,
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
