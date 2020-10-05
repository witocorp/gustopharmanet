<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Paisusuario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="paisusuario-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pais')->textInput() ?>

    <?= $form->field($model, 'usuario')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
