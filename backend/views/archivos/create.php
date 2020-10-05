<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Archivos */

$this->title = 'Create Archivos';
$this->params['breadcrumbs'][] = ['label' => 'Archivos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="archivos-create">

   
    <?= $this->render('_form', [
		'carpetaId' => $carpetaId,
        'model' => $model,
    ]) ?>

</div>
