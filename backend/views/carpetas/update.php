<?php
$session = Yii::$app->session;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Carpetas */

$this->title = 'Folders';
$this->params['breadcrumbs'][] = '/';
$this->params['breadcrumbs'][] = ['label' => $session['nombrePais'], 'url' => ['marcas/pais', 'id' => $session['idPais']]];
$this->params['breadcrumbs'][] = '/';
$this->params['breadcrumbs'][] = ['label' => $session['nombreMarca'], 'url' => ['productos/index', 'id' => $session['idMarca']]];
$this->params['breadcrumbs'][] = '/';
$this->params['breadcrumbs'][] = ['label' => $session['nombreProducto'], 'url' => ['carpetas/index', 'id' => $session['idProducto']]];
$this->params['breadcrumbs'][] = '/'.$this->title.'/Update';
?>
<div class="carpetas-update">

    <?= $this->render('_formUpdate', [
        'model' => $model,
    ]) ?>

</div>
