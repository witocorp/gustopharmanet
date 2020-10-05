<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use mdm\admin\components\Helper;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\PaisesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Countries';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="paises-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Paises', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'pais',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => Helper::filterActionColumn(['update']),
                'buttons' => [
                     'update' => function($url, $model) {
                        return Html::a('<i class="far fa-edit"></i>', $url);
                    }
                    ]
                ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
