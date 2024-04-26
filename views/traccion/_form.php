<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Traccion $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="traccion-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="card bg-light">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-lg-6">
                    <?= $form->field($model, 'uso')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                </div>
            </div>
        </div>
    </div>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>