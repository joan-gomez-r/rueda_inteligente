<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/** @var yii\web\View $this */
/** @var app\models\Marca $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="marca-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="card bg-light">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-lg-6">
                    <?= $form->field($model, 'pais_id')->widget(Select2::className(), [
                        'data' => $pais,
                        'options' => ['placeholder' => 'Seleccione el pais'],
                    ]) ?>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                </div>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>