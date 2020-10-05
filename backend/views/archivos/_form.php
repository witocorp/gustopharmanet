<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
/* @var $this yii\web\View */
/* @var $model backend\models\Archivos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="archivos-form">

    <?php $form = ActiveForm::begin([
		'action' => ['archivos/create'],
		'method' => 'post',
		'options' => ['enctype' => 'multipart/form-data']
		]); ?>

    <?= $form->field($model, 'idCarpeta')->hiddenInput(['value'=>$carpetaId])->label(false); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true])->label('Name') ?>

    <?php
		echo $form->field($model, 'file')->widget(
			FileInput::classname(), [
				'options' => ['multiple' => false],
				'pluginOptions' => ['allowedFileExtensions' => ['PDF', 'JPG', 'JPGE', 'MP4', 'PNG', 'GIF', 'PSD', 'AI','pdf', 'jpg', 'jpge', 'mp4', 'png', 'gif', 'psd', 'ai'], 'maxFileSize'=>30000,'showUpload' => false]
			],
		);
	?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
