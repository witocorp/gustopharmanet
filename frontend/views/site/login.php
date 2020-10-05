<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
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
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'class' => 'form-control form-control-user','placeholder' => "Username"])->label(false); ?>

                <?= $form->field($model, 'password')->passwordInput(['class' => 'form-control form-control-user','placeholder' => "Password"])->label(false); ?>

                <?= $form->field($model, 'rememberMe')->checkbox() ?>

                <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-user btn-block', 'name' => 'login-button']) ?>
                </div>
                If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.
            <?php ActiveForm::end(); ?>
				</div>
              </div>
            </div>
          </div>
        </div>

      </div>