<?php

/* @var $this yii\web\View */
use yii\helpers\Url;
$this->title = 'Gusto Pharma - Countries';
use frontend\models\Paisusuario;
use frontend\models\Paises;

$query = Paisusuario::find()->where(['usuario'=>Yii::$app->user->getId()]);
$pArr=array();
foreach ($query->each() as $data) {
	$pArr[] = $data->pais;
}
?>
<div
              class="d-sm-flex align-items-center justify-content-between mb-4"
            >
              <h1 class="h3 mb-0 text-gray-800">Countries</h1>
              <!--<a
                href="#"
                class="d-sm-inline-block btn btn-sm btn-success shadow-sm"
                ><i class="fas fa-cloud-upload-alt fa-sm text-white-50"></i>
                Subir archivo</a
              >-->
            </div>
			<?php if(in_array(1, $pArr) or in_array(2, $pArr)):?>
            <!-- Page Heading -->
            <div
              class="d-sm-flex align-items-center justify-content-between mb-4"
            >
              <h1 class="h5 mb-0 text-gray-800">EUROPE</h1>
            </div>
			
            <!-- Content Row -->
            <div class="row">
			<?php if(in_array(1, $pArr)):?>
              <div class="col-xl-3 col-md-6 mb-4">
                <a href="<?php echo Url::to(['marcas/pais', 'id' => 1]);?>" class="text-decoration-none">
                  <div class="card border-left-dark shadow h-100 py-2">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <div
                            class="text-xs font-weight-bold text-dark text-uppercase mb-1"
                          >
                            <?php              
              $queryP = Paises::find()->where(['id'=>1]);
              foreach ($queryP->each() as $dataP) {
                echo $dataP->pais;
              }
              ?>
                          </div>
                        </div>
                        <div class="col-auto">
                          <i class="fas fa-globe fa-2x text-gray-300"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
			  <?php endif;?>
			  <?php if(in_array(2, $pArr)):?>
			  <div class="col-xl-3 col-md-6 mb-4">
                <a href="<?php echo Url::to(['marcas/pais', 'id' => 2]);?>" class="text-decoration-none">
                  <div class="card border-left-dark shadow h-100 py-2">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <div
                            class="text-xs font-weight-bold text-dark text-uppercase mb-1"
                          >
                            <?php              
              $queryP = Paises::find()->where(['id'=>2]);
              foreach ($queryP->each() as $dataP) {
                echo $dataP->pais;
              }
              ?>
                          </div>
                        </div>
                        <div class="col-auto">
                          <i class="fas fa-globe fa-2x text-gray-300"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
			  <?php endif;?>
			 </div>
			 <?php endif;?>
			 
			 <?php if(in_array(3, $pArr)):?>
			 <div
              class="d-sm-flex align-items-center justify-content-between mb-4"
            >
              <h1 class="h5 mb-0 text-gray-800">SWITZERLAND</h1>
            </div>

            <!-- Content Row -->
            <div class="row">
              <div class="col-xl-3 col-md-6 mb-4">
                <a href="<?php echo Url::to(['marcas/pais', 'id' => 3]);?>" class="text-decoration-none">
                  <div class="card border-left-dark shadow h-100 py-2">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <div
                            class="text-xs font-weight-bold text-dark text-uppercase mb-1"
                          >
                            <?php              
              $queryP = Paises::find()->where(['id'=>3]);
              foreach ($queryP->each() as $dataP) {
                echo $dataP->pais;
              }
              ?>
                          </div>
                        </div>
                        <div class="col-auto">
                          <i class="fas fa-globe fa-2x text-gray-300"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
			 </div>
			 <?php endif;?>
			  <?php if(in_array(4, $pArr)):?>
			  <div
              class="d-sm-flex align-items-center justify-content-between mb-4"
            >
              <h1 class="h5 mb-0 text-gray-800">GEORGE (EASTERN EUROPE)</h1>
            </div>

            <!-- Content Row -->
            <div class="row">
              <div class="col-xl-3 col-md-6 mb-4">
                <a href="<?php echo Url::to(['marcas/pais', 'id' => 4]);?>" class="text-decoration-none">
                  <div class="card border-left-dark shadow h-100 py-2">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <div
                            class="text-xs font-weight-bold text-dark text-uppercase mb-1"
                          >
                            <?php              
              $queryP = Paises::find()->where(['id'=>4]);
              foreach ($queryP->each() as $dataP) {
                echo $dataP->pais;
              }
              ?>
                          </div>
                        </div>
                        <div class="col-auto">
                          <i class="fas fa-globe fa-2x text-gray-300"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
			 </div>
			 <?php endif;?>
			<?php if(in_array(5, $pArr)):?>
			<div class="d-sm-flex align-items-center justify-content-between mb-4"
            >
              <h1 class="h5 mb-0 text-gray-800">UK</h1>
            </div>

            <!-- Content Row -->
            <div class="row">
              <div class="col-xl-3 col-md-6 mb-4">
                <a href="<?php echo Url::to(['marcas/pais', 'id' => 5]);?>" class="text-decoration-none">
                  <div class="card border-left-dark shadow h-100 py-2">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <div
                            class="text-xs font-weight-bold text-dark text-uppercase mb-1"
                          >
                            <?php              
              $queryP = Paises::find()->where(['id'=>5]);
              foreach ($queryP->each() as $dataP) {
                echo $dataP->pais;
              }
              ?>
                          </div>
                        </div>
                        <div class="col-auto">
                          <i class="fas fa-globe fa-2x text-gray-300"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
			 </div>
			 <?php endif;?>
			<?php if(in_array(6, $pArr)):?> 
			 <div class="d-sm-flex align-items-center justify-content-between mb-4"
            >
              <h1 class="h5 mb-0 text-gray-800">USA</h1>
            </div>

            <!-- Content Row -->
            <div class="row">
              <div class="col-xl-3 col-md-6 mb-4">
                <a href="<?php echo Url::to(['marcas/pais', 'id' => 6]);?>" class="text-decoration-none">
                  <div class="card border-left-dark shadow h-100 py-2">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <div
                            class="text-xs font-weight-bold text-dark text-uppercase mb-1"
                          >
                            <?php              
              $queryP = Paises::find()->where(['id'=>6]);
              foreach ($queryP->each() as $dataP) {
                echo $dataP->pais;
              }
              ?>
                          </div>
                        </div>
                        <div class="col-auto">
                          <i class="fas fa-globe fa-2x text-gray-300"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
			 </div>
			<?php endif;?>
			
