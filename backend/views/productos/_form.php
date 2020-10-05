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

     <?php $form = ActiveForm::begin([
		'action' => ['productos/create'],
		'method' => 'post',
		'options' => ['enctype' => 'multipart/form-data']
	 ]); ?>
	
	<?= $form->field($model, 'idMarca')->hiddenInput(['value'=>$marcaId])->label(false); ?>

    <?= $form->field($model, 'producto')->textInput(['maxlength' => true])->label('Product')?>

    <?php
		echo $form->field($model, 'file')->widget(
			FileInput::classname(), [
				'options' => ['accept' => 'image/*','multiple' => false],
				'pluginOptions' => ['allowedFileExtensions' => ['JPG', 'JPGE', 'PNG', 'jpg', 'jpge', 'png'], 'maxFileSize'=>30000,'showUpload' => false]
			],
		);
	?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
