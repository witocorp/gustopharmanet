<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Productos;
use frontend\models\ProductosSearch;
use frontend\models\Carpetas;
use frontend\models\Marcas;
use frontend\models\MarcasSearch;
use frontend\models\Paisusuario;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\filters\AccessControl;

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
     * Lists all Productos models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->request->get('id')){
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
            $query = Paisusuario::find()->where(['usuario'=>Yii::$app->user->getId()]);
            $pArr=array();
            foreach ($query->each() as $data) {
                $pArr[] = $data->pais;
            }
            if(in_array($marcasProvider->getModels()[0]->pais, $pArr)){
                $model = new Productos();
                return $this->render('index', [
                    'idMarca' => $marca,
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
