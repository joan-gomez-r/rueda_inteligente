<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TipoCombustible $model */

$this->title = 'Create Tipo Combustible';
$this->params['breadcrumbs'][] = ['label' => 'Tipo Combustibles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-combustible-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
