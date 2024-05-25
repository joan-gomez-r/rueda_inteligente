<?php
use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;


$traccion_id = [
    '' => '',
    1 => 'Ciudad',
    2 => 'Rural',
    3 => 'Adaptable',
    4 => 'Deportivo',
];

$personas = [
    '' => '',
    2 => 2,
    5 => 5,
    7 => 7,
];

$tipo_combustible_id = [
    '' => '',
    1 => 'Gasolina Extra',
    2 => 'Gasolina Corriente',
    3 => 'Disel',
    4 => 'Gas',
    5 => 'Electricidad',
    6 => 'Hidrógeno',
]

    ?>




<div class="container">

    <?php $form = ActiveForm::begin([
        'id' => 'buscar-vehiculo',
        'method' => 'post', // Cambio de GET a POST
        'action' => ['buscar-vehiculos']
    ]); ?>

    <div class="row">

        <div class="col-lg-6">
            <?= $form->field($vehiculos, 'traccion_id', [
                'labelOptions' => [
                    'label' => '¿Cuál será el uso principal del vehículo?'
                ]
            ])->dropDownList(
                    $traccion_id,
                    [
                        'class' => 'form-control',
                        'pluginOptions' => ['allowClear' => true]
                    ]
                ) ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($vehiculos, 'tipo_combustible_id', [
                'labelOptions' => [
                    'label' => '¿Qué tipo de combustible buscas?'
                ]
            ])->dropDownList(
                    $tipo_combustible_id,
                    [
                        'class' => 'form-control',
                        'pluginOptions' => ['allowClear' => true]
                    ]
                ) ?>
        </div>

    </div>
    <div class="row">
        <div class="col-lg-3">
            <h6> Prefieres que sea... </h6>
            <div class="row">

                <div class="col-lg-4">
                    <?= $form->field($vehiculos, 'electrico')->checkbox() ?>
                </div>
                <div class="col-lg-4">
                    <?= $form->field($vehiculos, 'hibrido')->checkbox() ?>
                </div>
                <div class="col-lg-4">
                    <?= $form->field($vehiculos, 'turbo')->checkbox() ?>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <?= $form->field($vehiculos, 'no_pasajeros', [
                'labelOptions' => [
                    'label' => '¿Para cuántas personas?'
                ]
            ])->dropDownList(
                    $personas,
                    [
                        'class' => 'form-control',
                        'pluginOptions' => ['allowClear' => true]
                    ]
                ) ?>
        </div>
    </div>
    <div class="row">
        <div class="form-group">
            <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
</div>