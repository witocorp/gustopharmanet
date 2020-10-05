<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Request password reset';
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
    <p>Please fill out your email. A link to reset password will be sent there.</p>

    
            <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>

                <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Send', ['class' => 'btn btn-primary btn-user btn-block']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
              </div>
            </div>
          </div>
        </div>

      </div>