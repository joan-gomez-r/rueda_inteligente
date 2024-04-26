<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Traccion $model */

$this->title = 'Create Traccion';
$this->params['breadcrumbs'][] = ['label' => 'Traccions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="traccion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
