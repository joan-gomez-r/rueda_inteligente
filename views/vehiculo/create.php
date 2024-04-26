<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Vehiculo $model */

$this->title = 'Crear Vehiculo';
$this->params['breadcrumbs'][] = ['label' => 'Vehiculos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vehiculo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'marcas' => $marcas,
        'pais' => $pais,
        'traccion' => $traccion,
        'tipoCombustible' => $tipoCombustible,
    ]) ?>

</div>
