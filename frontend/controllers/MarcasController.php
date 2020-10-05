<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Marcas;
use frontend\models\MarcasSearch;
use frontend\models\Paises;
use frontend\models\PaisesSearch;
use frontend\models\Paisusuario;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
/**
 * MarcasController implements the CRUD actions for Marcas model.
 */
class MarcasController extends Controller
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
				'only' => ['index', 'pais','jpson'],
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
     * Lists all Marcas models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->request->get('id')){
            $query = Paisusuario::find()->where(['usuario'=>Yii::$app->user->getId()]);
            $pArr=array();
            foreach ($query->each() as $data) {
                $pArr[] = $data->pais;
            }
            if(in_array(Yii::$app->request->get('id'), $pArr)){
                $searchModel = new MarcasSearch();
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

                return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                ]);   
            }else{
                return $this->redirect(array('site/index'));
            }
            
        }else{
            return $this->redirect(array('site/index'));
        }
        
    }
	public function actionPais()
    {
        if(Yii::$app->request->get('id')){
            $query = Paisusuario::find()->where(['usuario'=>Yii::$app->user->getId()]);
            $pArr=array();
            foreach ($query->each() as $data) {
                $pArr[] = $data->pais;
            }
            if(in_array(Yii::$app->request->get('id'), $pArr)){
                $session = Yii::$app->session;
                $pais = Yii::$app->request->get('id');  
                $searchModel = new MarcasSearch(['pais' => $pais,]);
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                $model = new Marcas();
                $searchPaises = new PaisesSearch(['id' => $pais,]);
                $paisesProvider = $searchPaises->search(Yii::$app->request->queryParams);
                foreach($paisesProvider->getModels() as $dato):
                    $session['nombrePais'] = $dato->pais;
                    $session['idPais'] = $dato->id;
                endforeach;
                return $this->render('index', [
                    'paisId' => $pais,
                    'model' => $model,
                    'searchModel' => $searchModel,
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
		$pais = Yii::$app->request->get('id');	
        $searchModel = new MarcasSearch(['pais' => $pais,]);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		$datos = array();
		foreach($dataProvider->getModels() as $dato):
			$datos[] = $dato;
		endforeach;
		return $datos;
    }
    /**
     * Finds the Marcas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Marcas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Marcas::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
