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

   <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']
	 ]); ?>
	
	<?= $form->field($model, 'idMarca')->hiddenInput()->label(false); ?>

    <?= $form->field($model, 'producto')->textInput(['maxlength' => true])->label('Product')?>

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
