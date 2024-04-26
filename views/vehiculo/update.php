<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Vehiculo $model */

$this->title = 'Actualizar Vehiculo: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Vehiculos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="vehiculo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'marcas' => $marcas,
        'pais' => $pais,
        'traccion' => $traccion,
        'tipoCombustible' => $tipoCombustible,
    ]) ?>

</div>
