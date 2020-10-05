<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Marcas */

$this->title = 'Create Trademark';
$this->params['breadcrumbs'][] = ['label' => 'Marcas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="marcas-create">

    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'paisId' => $paisId,
		'model' => $model,
		'paises' => $paises,
    ]) ?>

</div>
