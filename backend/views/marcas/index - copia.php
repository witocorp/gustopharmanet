<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\MarcasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Marcas';
$this->params['breadcrumbs'][] = '/'.$this->title;
?>
<div class="marcas-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Marcas', ['create', 'id' => $paisId], ['class' => 'btn btn-success']) ?>
    </p>

	 <!-- Content Row -->
            <div class="row">
			<?php foreach($dataProvider->getModels() as $datos):?>
				<div class="col-xl-3 col-md-6 mb-4">
                  <div class="card border-left-dark shadow h-100 py-2">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
						<i class="fas fa-cog icono_op icono_opcion"></i>
						<div class="icono_op no_show opciones_caja">
							<a href="<?php echo Url::to(['marcas/update', 'id' => $datos->id]);?>"><i class="fas fa-pencil-alt"></i> Editar Marca</a><br/>
							<a href="<?php echo Url::to(['productos/index', 'id' => $datos->id]);?>"><i class="fas fa-boxes"></i> Productos</a>
						</div>
                        <div class="col mr-2">
                          <div
                            class="text-xs font-weight-bold text-dark text-uppercase mb-1"
                          >
                            <?php echo $datos->marca;?>
                          </div>
                        </div>
                        <div class="col-auto">
                          <img src="/pharma/backend/web/<?php echo $datos->url;?>"class="col-xs-12">
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
			<?php endforeach;?>
</div>
