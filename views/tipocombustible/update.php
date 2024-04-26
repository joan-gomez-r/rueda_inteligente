<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TipoCombustible $model */

$this->title = 'Update Tipo Combustible: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tipo Combustibles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tipo-combustible-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
