<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Carpetas */

$this->title = 'Create Carpetas';
$this->params['breadcrumbs'][] = ['label' => 'Carpetas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="carpetas-create">

    <?= $this->render('_form', [
		'productoId' => $productoId,
        'model' => $model,
    ]) ?>

</div>
