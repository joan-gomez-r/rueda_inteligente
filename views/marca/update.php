<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Marca $model */

$this->title = 'Actualizar Marca: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Marcas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="marca-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'pais' => $pais,
    ]) ?>

</div>
