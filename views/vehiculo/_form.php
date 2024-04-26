<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use kartik\checkbox\CheckboxX;

/** @var yii\web\View $this */
/** @var app\models\Vehiculo $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="vehiculo-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-lg-6">
            <div class="card bg-light">
                <div class="card-header">
                    Datos generales
                    <div class="float-right">
                    </div>
                </div>
                <div class="card-body">

                    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'anio_inicial')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'anio_final')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'precio_inicial')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'precio_final')->textInput(['maxlength' => true]) ?>


                    <?= $form->field($model, 'pais_id')->widget(Select2::className(), [
                        'data' => $pais,
                        'options' => ['placeholder' => 'Seleccione el pais'],
                    ]) ?>

                    <?= $form->field($model, 'marca_id')->widget(Select2::className(), [
                        'data' => $marcas,
                        'options' => ['placeholder' => 'Seleccione la marca'],
                    ]) ?>
                    <?= $form->field($model, 'archivo')->fileInput() ?>
                </div>
            </div>
            <div class="card bg-light">
                <div class="card-header">
                    Dimensiones
                    <div class="float-right">

                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <?= $form->field($model, 'peso')->textInput() ?>
                        </div>
                        <div class="col-lg-6">
                            <?= $form->field($model, 'largo')->textInput() ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <?= $form->field($model, 'ancho')->textInput() ?>
                        </div>
                        <div class="col-lg-6">
                            <?= $form->field($model, 'alto')->textInput() ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <?= $form->field($model, 'altura_suelo')->textInput() ?>
                        </div>
                        <div class="col-lg-6">
                            <?= $form->field($model, 'no_pasajeros')->textInput() ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <?= $form->field($model, 'capacidad_maletero')->textInput() ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">

            <div class="card bg-light">
                <div class="card-header">
                    Datos Tecnicos
                    <div class="float-right">

                    </div>
                </div>
                <div class="card-body">

                    <?= $form->field($model, 'cilindrada')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'consumo')->textInput() ?>

                    <?= $form->field($model, 'hp')->textInput() ?>

                    <?= $form->field($model, 'torque')->textInput() ?>
                    <div class="row">
                        <div class="col-lg-4">
                            <?= $form->field($model, 'turbo')->checkbox() ?>
                        </div>
                        <div class="col-lg-4">
                            <?= $form->field($model, 'electrico')->checkbox() ?>
                        </div>
                        <div class="col-lg-4">
                            <?= $form->field($model, 'hibrido')->checkbox() ?>
                        </div>
                    </div>

                    <?= $form->field($model, 'tipo_combustible_id')->widget(Select2::className(), [
                        'data' => $tipoCombustible,
                        'options' => ['placeholder' => 'Seleccione el combustible'],
                    ]) ?>

                    <?= $form->field($model, 'traccion_id')->widget(Select2::className(), [
                        'data' => $traccion,
                        'options' => ['placeholder' => 'Seleccione la traccion'],
                    ]) ?>
                </div>
            </div>
        </div>



        <div class="row">
            <div class="col-lg-6">
            </div>
            <div class="col-lg-4">

                <div class="form-group">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                </div>

            </div>
        </div>

        <?php ActiveForm::end(); ?>

    </div>