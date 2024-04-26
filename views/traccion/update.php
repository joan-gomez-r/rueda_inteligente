<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Traccion $model */

$this->title = 'Actualizar Traccion: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Traccions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="traccion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
