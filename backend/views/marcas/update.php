<?php
$session = Yii::$app->session;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Marcas */

$this->title = 'Update Marcas: ' . $model->id;
$this->params['breadcrumbs'][] = '/ ';
$this->params['breadcrumbs'][] = ['label' => $session['nombrePais'], 'url' => ['marcas/pais', 'id' => $model->pais]];
$this->params['breadcrumbs'][] = '/ ';
$this->params['breadcrumbs'][] = ['label' => $model->marca];
$this->params['breadcrumbs'][] = '/Update';
?>
<div class="marcas-update">

    <?= $this->render('_formUpdate', [
        'model' => $model,
		'paises' => $paises,
    ]) ?>

</div>
