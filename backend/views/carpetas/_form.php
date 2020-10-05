<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Carpetas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="carpetas-form">

    <?php $form = ActiveForm::begin([
		'action' => ['carpetas/create'],
		'method' => 'post',
		'options' => ['enctype' => 'multipart/form-data']
	]); ?>

	<?= $form->field($model, 'idProducto')->hiddenInput(['value'=>$productoId])->label(false); ?>
    
	<?= $form->field($model, 'nombre')->textInput(['maxlength' => true])->label('Name')  ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
