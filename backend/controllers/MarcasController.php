<?php

namespace backend\controllers;

use Yii;
use backend\models\Marcas;
use backend\models\MarcasSearch;
use backend\models\Paises;
use backend\models\PaisesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
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
                    'delete' => ['GET'],
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
        $searchModel = new MarcasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
	public function actionPais()
    {
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
     * Displays a single Marcas model.
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
     * Creates a new Marcas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Marcas();
		if ($model->load(Yii::$app->request->post())) {
			$model->file= UploadedFile::getInstance($model, 'file');
			$nombreImage = 'protected/img/'.date("YmdHis").'.'.$model->file->extension;
			$model->file->saveAs('../../'.$nombreImage);
			$model->url=$nombreImage;
			$model->save();
            return $this->redirect(['pais', 'id' => $model->pais]);
        }
		$paises=Paises::find()->all();	
        return $this->render('create', [
			'paisId' => Yii::$app->request->get('id'),
            'model' => $model,
			'paises' => $paises,
        ]);
    }

    /**
     * Updates an existing Marcas model.
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
                if(isset(UploadedFile::getInstance($model, 'fileup')->extension)){
                    $model->file= UploadedFile::getInstance($model, 'fileup');
                    $nombreImage = 'protected/img/'.date("YmdHis").'.'.$model->file->extension;
                    $model->file->saveAs('../../'.$nombreImage);
                    $model->url=$nombreImage;               
                }else{
                    $model->file='[_attributes:yii\db\BaseActiveRecord:private]';
                }    
            }
            $model->save();
            return $this->redirect(['pais', 'id' => $model->pais]);
        }
  $paises=Paises::find()->all();
        return $this->render('update', [
            'model' => $model,
   'paises' => $paises,
        ]);
    }
    /**
     * Deletes an existing Marcas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete()
    {
		\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		$id = Yii::$app->request->get('id');	
        $datoEliminar = $this->findModel($id);
		$pais = $datoEliminar->pais;
		$datoEliminar->delete();
		
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
