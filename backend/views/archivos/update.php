<?php
$session = Yii::$app->session;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Archivos */

$this->params['breadcrumbs'][] = '/';
$this->params['breadcrumbs'][] = ['label' => $session['nombrePais'], 'url' => ['marcas/pais', 'id' => $session['idPais']]];
$this->params['breadcrumbs'][] = '/';
$this->params['breadcrumbs'][] = ['label' => $session['nombreMarca'], 'url' => ['productos/index', 'id' => $session['idMarca']]];
$this->params['breadcrumbs'][] = '/';
$this->params['breadcrumbs'][] = ['label' => $session['nombreProducto'], 'url' => ['carpetas/index', 'id' => $session['idProducto']]];
$this->params['breadcrumbs'][] = '/';
$this->params['breadcrumbs'][] = ['label' => $session['nombreCarpeta'], 'url' => ['archivos/index', 'id' => $session['idCarpeta']]];
$this->params['breadcrumbs'][] = '/'.$this->title;
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="archivos-update">


    <?= $this->render('_formUpdate', [
        'model' => $model,
    ]) ?>

</div>
