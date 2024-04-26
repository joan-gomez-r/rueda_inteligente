<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Pais $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pais-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="card bg-light">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
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