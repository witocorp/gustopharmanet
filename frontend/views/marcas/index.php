<?php
$session = Yii::$app->session;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\MarcasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Trademark';
$this->params['breadcrumbs'][] = '/ ';
$this->params['breadcrumbs'][] = ['label' => $session['nombrePais'], 'url' => ['marcas/pais', 'id' => $paisId]];
$this->params['breadcrumbs'][] = '/'.$this->title;
$this->registerJsFile("https://cdn.jsdelivr.net/npm/vue/dist/vue.js");
$this->registerJsFile("https://cdn.jsdelivr.net/vue.resource/1.3.1/vue-resource.min.js");
$this->registerJsFile("https://unpkg.com/vue-router");
$this->registerJsFile("@web/js/marcas.js");
?>
<div id="app" class="marcas-index">

	<div class="d-flex justify-content-between bd-highlight mb-3">
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
						<a v-bind:href="'<?php echo Url::base(true);?>/index.php?r=productos%2Findex&amp;id='+responder.id">
							<div class="col mr-2">
							  <div class="text-xs font-weight-bold text-dark mb-1">
								{{ responder.marca }}
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
