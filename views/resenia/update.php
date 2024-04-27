<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Resenia $model */

$this->title = 'Update Resenia: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Resenias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="resenia-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
