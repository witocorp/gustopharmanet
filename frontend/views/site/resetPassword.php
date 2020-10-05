<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ResetPasswordForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Reset password';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-lg-6 mx-auto site-login">

        <div class="card o-hidden border-0 shadow-lg my-5 login_card">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">
                <div class="text-center">
                    <img class="mx-auto mb-4 img-fluid" src="./img/logo-grupo-pharma.png" alt="logo gustopharma">
                    <!-- <h1 class="h4 text-gray-900 mb-4">Welcome!</h1> -->
                  </div>
                  <p>Please choose your new password:</p>

                <?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>

                <?= $form->field($model, 'password')->passwordInput(['autofocus' => true]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-primary btn-user btn-block']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>