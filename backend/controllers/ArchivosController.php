<?php

namespace backend\controllers;

use Yii;
use backend\models\Archivos;
use backend\models\ArchivosSearch;
use backend\models\Carpetas;
use backend\models\CarpetasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

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
        ];
    }

    /**
     * Lists all Archivos models.
     * @return mixed
     */
    public function actionIndex()
    {
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
		$model = new Archivos();
        return $this->render('index', [
			'carpetaId' => $carpeta,
            'searchModel' => $searchModel,
			'model' => $model,
            'dataProvider' => $dataProvider,
        ]);
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
     * Displays a single Archivos model.
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
	public function actionDownload() {
	   
		return \Yii::$app->response->sendFile('../../'.Yii::$app->request->get('url'))->send();
	}
    /**
     * Creates a new Archivos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Archivos();

        if ($model->load(Yii::$app->request->post())) {
            $model->file= UploadedFile::getInstance($model, 'file');
			$nombreImage = 'protected/files/'.date("YmdHis").'.'.$model->file->extension;
			$model->file->saveAs('../../'.$nombreImage);
			$model->url=$nombreImage;
			$model->save();
            return $this->redirect(['index', 'id' => $model->idCarpeta]);
        }

        return $this->render('create', [
			'carpetaId' => Yii::$app->request->get('id'),
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Archivos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
			 if(isset(UploadedFile::getInstance($model, 'fileup')->extension)){
                $model->file= UploadedFile::getInstance($model, 'fileup');
				$nombreImage = 'protected/files/'.date("YmdHis").'.'.$model->file->extension;
				$model->file->saveAs('../../'.$nombreImage);
				$model->url=$nombreImage;				
			}else{
                $model->file='[_attributes:yii\db\BaseActiveRecord:private]';
            }
			$model->save();
            return $this->redirect(['index', 'id' => $model->idCarpeta]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Archivos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $archivo = $this->findModel($id);
        $archivoid = $archivo->idCarpeta;
		unlink('../../'.$archivo->url);
        $archivo->delete();
        return $this->redirect(['index', 'id' => $archivoid]);
        
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
