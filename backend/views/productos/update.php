<?php
$session = Yii::$app->session;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Productos */

$this->title = $model->producto;
$this->params['breadcrumbs'][] = '/';
$this->params['breadcrumbs'][] = ['label' => $session['nombrePais'], 'url' => ['marcas/pais', 'id' => $session['idPais']]];
$this->params['breadcrumbs'][] = '/';
$this->params['breadcrumbs'][] = ['label' => $session['nombreMarca'], 'url' => ['productos/index', 'id' => $session['idMarca']]];
$this->params['breadcrumbs'][] = '/'.$this->title;
?>
<div class="productos-update">

    
    <?= $this->render('_formUpdate', [
        'model' => $model,
    ]) ?>

</div>
