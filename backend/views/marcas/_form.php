<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use kartik\file\FileInput;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Marcas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="marcas-form">

    <?php $form = ActiveForm::begin([
		'action' => ['marcas/create'],
		'method' => 'post',
		'options' => ['enctype' => 'multipart/form-data']
	]); ?>
	<?php //$listPaises=ArrayHelper::map($paises,'id','pais');?>
	
	<?= $form->field($model, 'pais')->hiddenInput(['value'=>$paisId])->label(false); ?>
	
	<?= $form->field($model, 'marca')->textInput(['maxlength' => true])->label('Trademark') ?>

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