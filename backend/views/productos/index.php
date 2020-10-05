<?php
$session = Yii::$app->session;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProductosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = '/';
$this->params['breadcrumbs'][] = ['label' => $session['nombrePais'], 'url' => ['marcas/pais', 'id' => $session['idPais']]];
$this->params['breadcrumbs'][] = '/';
$this->params['breadcrumbs'][] = ['label' => $session['nombreMarca'], 'url' => ['productos/index', 'id' => $idMarca]];
$this->params['breadcrumbs'][] = '/'.$this->title;
$this->registerJsFile("https://cdn.jsdelivr.net/npm/vue/dist/vue.js");
$this->registerJsFile("https://cdn.jsdelivr.net/vue.resource/1.3.1/vue-resource.min.js");
$this->registerJsFile("https://unpkg.com/vue-router");
$this->registerJsFile("@web/js/actions.js");
?>
<div id="appPr" class="productos-index">
    
	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Add new Product</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			<?= $this->render('_form', [
				'marcaId' => $idMarca,
				'model' => $model,
			]) ?>
		  </div>
		</div>
	  </div>
	</div>
	<div class="d-flex justify-content-between bd-highlight mb-3">
		<div class="p-2 bd-highlight">
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
			  <i class="fas fa-plus-circle"></i> Add Product
			</button>
		</div>
		<div class="p-2 bd-highlight">
			<!-- Topbar Search -->
            <form class="form-inline search_vue">
              <div class="input-group">
                <input
                  type="text"
                  class="form-control border-0 small"
                  placeholder="Search..."
                  aria-label="Search"
                  aria-describedby="basic-addon2"
				  v-model="search"
                />
                <div class="input-group-append">
                  <button class="btn btn-dark" type="button">
                    <i class="fas fa-search fa-sm"></i>
                  </button>
                </div>
              </div>
            </form>
		</div>
	  </div>
		<div class="row">		
			<div v-for="responder, index in searchdatos" class="col-xl-3 col-md-6 mb-4" :key="index">
                  <div class="card border-left-dark shadow h-100 py-2">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
						<i @mouseover="showIndex = index" class="fas fa-cog icono_op icono_opcion"></i>
						<div v-if="showIndex === index" @mouseleave="showIndex = null"  class="icono_op no_show opciones_caja">
							<a v-bind:href="'<?php echo Url::base(true);?>/index.php?r=productos%2Fupdate&amp;id='+responder.id"><i class="fas fa-pencil-alt"></i> Edit Product</a><br/>
							<a v-bind:href="'<?php echo Url::base(true);?>/index.php?r=productos%2Fdelete&amp;id='+responder.id" title="Delete" aria-label="Delete" data-confirm="Are you sure you want to delete this Product?" data-method="post" data-pjax="0"><i class="fas fa-minus-circle"></i> Delete Product</a>
						</div>
						<a v-bind:href="'<?php echo Url::base(true);?>/index.php?r=carpetas%2Findex&amp;id='+responder.id">
							<div class="col mr-2">
							  <div class="text-xs font-weight-bold text-dark mb-1">
								{{ responder.producto }}
							  </div>
							</div>
							<div class="col-auto">
							  <img v-bind:src="'<?php echo Url::to('/', true);?>'+responder.url"class="col-xs-12">
							</div>
						</a>
                      </div>
                    </div>
                  </div>
              </div>
		</div>
</div>
