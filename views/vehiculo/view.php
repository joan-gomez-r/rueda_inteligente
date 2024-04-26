<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Vehiculo $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Vehiculos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="vehiculo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nombre',
            'anio_inicial',
            'anio_final',
            'hp',
            'torque',
            'precio_inicial',
            'precio_final',
            'peso',
            'largo',
            'ancho',
            'alto',
            'altura_suelo',
            'no_pasajeros',
            'capacidad_maletero',
            'consumo',
            'cilindrada',
            'turbo',
            'electrico',
            'hibrido',
            'pais_id',
            'marca_id',
            'tipo_combustible_id',
            'traccion_id',
            'imagen',
        ],
    ]) ?>

</div>
