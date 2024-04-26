<?php

use app\models\Vehiculo;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\VehiculoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Vehiculos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vehiculo-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Vehiculo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
            'format'=>'html',
            'value'=>function($data){return Html::img($data->imagen, ['width'=>'120px']);},
            ],
            'nombre',
            //'anio_inicial',
            //'anio_final',
            'hp',
            'torque',
            //'precio_final',
            //'peso',
            //'largo',
            //'ancho',
            //'alto',
            //'altura_suelo',
            //'no_pasajeros',
            //'capacidad_maletero',
            //'consumo',
            'cilindrada',
            'precio_inicial',
            //'turbo',
            //'electrico',
            //'hibrido',
            //'pais_id',
            //'marca_id',
            //'tipo_combustible_id',
            //'traccion_id',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Vehiculo $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
