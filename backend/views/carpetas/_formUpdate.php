<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Productos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="productos-form">

     <?php $form = ActiveForm::begin(); ?>
	
	<?= $form->field($model, 'idProducto')->hiddenInput()->label(false); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true])->label('Name') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
