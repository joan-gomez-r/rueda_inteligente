<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ReseniaSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="resenia-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'titulo') ?>

    <?= $form->field($model, 'mecanica') ?>

    <?= $form->field($model, 'disenio') ?>

    <?= $form->field($model, 'precio') ?>

    <?php // echo $form->field($model, 'durabilidad') ?>

    <?php // echo $form->field($model, 'kilometraje') ?>

    <?php // echo $form->field($model, 'aprobado') ?>

    <?php // echo $form->field($model, 'vehiculo_id') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <?php // echo $form->field($model, 'aprobador_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
