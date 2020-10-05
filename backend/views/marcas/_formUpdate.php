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

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
	<?php $listPaises=ArrayHelper::map($paises,'id','pais');?>
	<?= $form->field($model, 'pais')->hiddenInput()->label(false); ?>
	<?= $form->field($model, 'marca')->textInput(['maxlength' => true])->label('Trademark') ?>

	<?php 
  foreach ($model as $dato) {
   $imgUrl = $dato;
  }
 ?>
    <?php
  echo $form->field($model, 'fileup')->widget(
   FileInput::classname(), [
    'options' => ['accept' => 'image/*','multiple' => false],
    'pluginOptions' => ['allowedFileExtensions' => ['JPG', 'JPGE', 'PNG', 'jpg', 'jpge', 'png'], 'maxFileSize'=>30000,'showUpload' => false,'initialPreview'=>[Url::to('/', true).$imgUrl],'initialPreviewAsData'=>true,'showRemove' => false]
   ],
  )->label('File');
 ?>
 <div class="input-group mb-3">
   <div class="input-group-prepend">
     <div class="input-group-text">
       <input type="checkbox" name="chDe">
     </div>
   </div>
   <span class="input-group-text" id="inputGroup-sizing-default">Remove image</span>
 </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
