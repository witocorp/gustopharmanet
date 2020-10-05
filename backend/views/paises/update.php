<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Paises */

$this->title = 'Update: ' . $model->id;
?>
<div class="paises-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
