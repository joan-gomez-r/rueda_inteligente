<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Resenia $model */

$this->title = 'Create Resenia';
$this->params['breadcrumbs'][] = ['label' => 'Resenias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="resenia-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
