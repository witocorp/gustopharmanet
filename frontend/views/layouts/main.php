<?php

/* @var $this \yii\web\View */
/* @var $content string */


use frontend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use yii\helpers\Url;
use frontend\models\Paisusuario;
use frontend\models\Paises;

AppAsset::register($this);
$query = Paisusuario::find()->where(['usuario'=>Yii::$app->user->getId()]);
$pArr=array();
foreach ($query->each() as $data) {
	$pArr[] = $data->pais;
}
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
      <!-- Sidebar -->
      <ul
        class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion"
        id="accordionSidebar"
      >
        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo Url::base(true);?>">
            <img
              class="mx-auto img-fluid"
              src="./img/logo-grupo-pharma.png"
              alt="logo gustopharma"
            />
          </a>
          <!-- <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Hélix original complex</span></a> -->
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider" />

        <!-- Heading -->
		<?php if(in_array(1, $pArr) or in_array(2, $pArr)):?>
	   <div class="sidebar-heading">
          EUROPE
        </div>
		<?php endif;?>
        <!-- Nav Item -->
		<?php if(in_array(1, $pArr)):?>
        <li class="nav-item">
		
          <a class="nav-link" href="<?php echo Url::base(true).'/index.php?r=marcas/pais&id=1';?>">
            <i class="fas fa-globe"></i>
            <span><?php              
              $queryP = Paises::find()->where(['id'=>1]);
              foreach ($queryP->each() as $dataP) {
                echo $dataP->pais;
              }
              ?></span></a>
        </li>
		<?php endif;?>
		<?php if(in_array(2, $pArr)):?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo Url::base(true).'/index.php?r=marcas/pais&id=2';?>">
            <i class="fas fa-globe"></i>
            <span><?php              
              $queryP = Paises::find()->where(['id'=>2]);
              foreach ($queryP->each() as $dataP) {
                echo $dataP->pais;
              }
              ?></span></a
          >
        </li>
		<?php endif;?>
		<?php if(in_array(3, $pArr)):?>
        <div class="sidebar-heading">
          SWITZERLAND
        </div>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo Url::base(true).'/index.php?r=marcas/pais&id=3';?>">
            <i class="fas fa-globe"></i>
            <span><?php              
              $queryP = Paises::find()->where(['id'=>3]);
              foreach ($queryP->each() as $dataP) {
                echo $dataP->pais;
              }
              ?></span></a
          >
        </li>
		<?php endif;?>
		<?php if(in_array(4, $pArr)):?>
        <!-- Heading -->
        <div class="sidebar-heading">
          GEORGE (EASTERN EUROPE)
        </div>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo Url::base(true).'/index.php?r=marcas/pais&id=4';?>">
            <i class="fas fa-globe"></i>
            <span><?php              
              $queryP = Paises::find()->where(['id'=>4]);
              foreach ($queryP->each() as $dataP) {
                echo $dataP->pais;
              }
              ?></span></a
          >
        </li>
		<?php endif;?>
		<?php if(in_array(5, $pArr)):?>
        <!-- Heading -->
        <div class="sidebar-heading">
          UK
        </div>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo Url::base(true).'/index.php?r=marcas/pais&id=5';?>">
            <i class="fas fa-globe"></i>
            <span><?php              
              $queryP = Paises::find()->where(['id'=>5]);
              foreach ($queryP->each() as $dataP) {
                echo $dataP->pais;
              }
              ?></span></a
          >
        </li>
		<?php endif;?>
		<?php if(in_array(6, $pArr)):?>
        <!-- Heading -->
        <div class="sidebar-heading">
          USA
        </div>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo Url::base(true).'/index.php?r=marcas/pais&id=6';?>">
            <i class="fas fa-globe"></i>
            <span><?php              
              $queryP = Paises::find()->where(['id'=>6]);
              foreach ($queryP->each() as $dataP) {
                echo $dataP->pais;
              }
              ?></span></a
          >
        </li>
		<?php endif;?>
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block" />

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
          <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
      </ul>
      <!-- End of Sidebar -->

      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
          <!-- Topbar -->
          <nav
            class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow"
          >
            <!-- Sidebar Toggle (Topbar) -->
            <button
              id="sidebarToggleTop"
              class="btn btn-link d-md-none rounded-circle mr-3"
            >
              <i class="fa fa-bars"></i>
            </button>
		
            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">
			
			  <div class="topbar-divider d-none d-sm-block"></div>
	            <!-- Nav Item - User Information -->
              <li class="nav-item dropdown no-arrow">
				<a
                  class="nav-link dropdown-toggle"
                  href="#"
                  id="userDropdown"
                  role="button"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  <span class="mr-2 d-none d-lg-inline text-gray-600 small"
                    ><?php echo Yii::$app->user->identity->username;?></span
                  >
                  <img
                    class="img-profile rounded-circle"
                    src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png"
                  />
                </a>
                <!-- Dropdown - User Information -->
                <div
                  class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                  aria-labelledby="userDropdown"
                >
                  
                  <a
                    class="dropdown-item"
                    href="<?php echo Url::base(true).'/index.php?r=site/logout'?>"
                    data-toggle="modal"
                    data-target="#logoutModal"
					data-method="post"
                  >
                    <i
                      class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"
                    ></i>
                    Logout
                  </a>
                </div>
              </li>
            </ul>
          </nav>
          <!-- End of Topbar -->

          <!-- Begin Page Content -->
          <div class="container-fluid">
			<?php $this->beginBody() ?>
			<?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
		  </div>
          <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright &copy; Gusto Pharma 2020</span>
            </div>
          </div>
        </footer>
        <!-- End of Footer -->
      </div>
      <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
