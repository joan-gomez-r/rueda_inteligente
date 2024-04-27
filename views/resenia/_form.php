<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\rating\StarRating;

/** @var yii\web\View $this */
/** @var app\models\Resenia $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="resenia-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'titulo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mecanica')->widget(StarRating::classname(), [
        'pluginOptions' => [
            'size' => 'sm',
            'step' => 1,
            'clearButton' => false
        ]
    ]) ?>

    <?= $form->field($model, 'disenio')->widget(StarRating::classname(), [
        'pluginOptions' => [
            'size' => 'sm',
            'step' => 1,
            'clearButton' => false
        ]
    ]) ?>

    <?= $form->field($model, 'precio')->widget(StarRating::classname(), [
        'pluginOptions' => [
            'size' => 'sm',
            'step' => 1,
            'clearButton' => false
        ]
    ]) ?>

    <?= $form->field($model, 'durabilidad')->widget(StarRating::classname(), [
        'pluginOptions' => [
            'size' => 'sm',
            'step' => 1,
            'clearButton' => false
        ]
    ]) ?>

    <?= $form->field($model, 'kilometraje')->textInput() ?>

    <?= $form->field($model, 'aprobado')->textInput() ?>

    <?= $form->field($model, 'vehiculo_id')->textInput() ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'aprobador_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
