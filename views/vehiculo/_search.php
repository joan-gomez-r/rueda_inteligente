<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\VehiculoSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="vehiculo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'anio_inicial') ?>

    <?= $form->field($model, 'anio_final') ?>

    <?= $form->field($model, 'hp') ?>

    <?php // echo $form->field($model, 'torque') ?>

    <?php // echo $form->field($model, 'precio_inicial') ?>

    <?php // echo $form->field($model, 'precio_final') ?>

    <?php // echo $form->field($model, 'peso') ?>

    <?php // echo $form->field($model, 'largo') ?>

    <?php // echo $form->field($model, 'ancho') ?>

    <?php // echo $form->field($model, 'alto') ?>

    <?php // echo $form->field($model, 'altura_suelo') ?>

    <?php // echo $form->field($model, 'no_pasajeros') ?>

    <?php // echo $form->field($model, 'capacidad_maletero') ?>

    <?php // echo $form->field($model, 'consumo') ?>

    <?php // echo $form->field($model, 'cilindrada') ?>

    <?php // echo $form->field($model, 'turbo') ?>

    <?php // echo $form->field($model, 'electrico') ?>

    <?php // echo $form->field($model, 'hibrido') ?>

    <?php // echo $form->field($model, 'pais_id') ?>

    <?php // echo $form->field($model, 'marca_id') ?>

    <?php // echo $form->field($model, 'tipo_combustible_id') ?>

    <?php // echo $form->field($model, 'traccion_id') ?>

    <?php // echo $form->field($model, 'imagen') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
