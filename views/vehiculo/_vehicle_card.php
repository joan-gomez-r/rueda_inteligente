<?php
use yii\helpers\Html;

/* @var $model app\models\Vehiculo */

?>
<div class="vehicle-card">
    <div class="card-image">
        <?= Html::img($model->imagen, ['class' => 'vehicle-img']) ?>
    </div>
    <div class="card-content">
        <h2><?= Html::encode($model->marca->nombre) ?> <?= Html::encode($model->nombre) ?></h2>
        <p><strong>Año:</strong> <?= Html::encode($model->anio_inicial) ?> - <?= Html::encode($model->anio_final) ?></p>
        <p><strong>Precio:</strong> <?= Html::encode($model->precio_inicial) ?> -
            <?= Html::encode($model->precio_final) ?>
        </p>
        <p><strong>País:</strong> <?= Html::encode($model->pais->nombre) ?></p>
        <p><strong>Cilindrada:</strong> <?= Html::encode($model->cilindrada) ?></p>
        <p><strong>Tipo de Combustible:</strong> <?= Html::encode($model->tipoCombustible->nombre) ?></p>
        <div class="additional-info">
            <button class="btn btn-primary add-row-btn">+</button>
            <div class="additional-row" style="display: none;">
                El vehiculo aun no cuenta con reseñas
            </div>
        </div>
    </div>
</div>

&nbsp

<script>
    $(document).ready(function () {
        $('.add-row-btn').click(function () {
            $(this).next('.additional-row').toggle();
        });
    });
</script>