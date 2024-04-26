<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Marca $model */

$this->title = 'Crear Marca';
$this->params['breadcrumbs'][] = ['label' => 'Marcas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="marca-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'pais' => $pais,
    ]) ?>

</div>
