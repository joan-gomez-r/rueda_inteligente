<?php

/** @var yii\web\View $this */

use app\models\Vehiculo;
use yii\bootstrap5\Modal;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Rueda Inteligente';
?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<div class="site-index">
    <div class="content-wrapper">
        <div class="image-container">
            <img src="<?= Yii::getAlias('@web/images/logo.png') ?>" alt="Imagen de inicio">
        </div>
        <!-- Texto -->
        <div class="text-container">
            <h1>¿No sabes cuál vehículo elegir?</h1>
            <p>Estamos aquí para que puedas escoger en el mercado actual y acorde a tus necesidades, sin
                tanto lío. </p>
        </div>
    </div>

    <div class="body-content">
        <center>
            <h1>Todos nuestros vehículos registrados: </h1>
        </center>
        &nbsp
        <div class="vehicles-container">
            <?php foreach ($dataProvider->getModels() as $index => $vehiculo): ?>
                <div class="vehicle-card">
                    <div class="card-image">
                        <?= Html::img($vehiculo->imagen, ['class' => 'vehicle-img']) ?>
                    </div>
                    <div class="card-content">
                        <h2><?= Html::encode($vehiculo->marca->nombre) ?>     <?= Html::encode($vehiculo->nombre) ?></h2>
                        <p><strong>Año:</strong> <?= Html::encode($vehiculo->anio_inicial) ?> -
                            <?= Html::encode($vehiculo->anio_final) ?>
                        </p>
                        <p><strong>Precio:</strong> <?= Html::encode($vehiculo->precio_inicial) ?> -
                            <?= Html::encode($vehiculo->precio_final) ?>
                        </p>
                        <p><strong>País:</strong> <?= Html::encode($vehiculo->pais->nombre) ?></p>
                        <p><strong>Cilindrada:</strong> <?= Html::encode($vehiculo->cilindrada) ?></p>
                        <p><strong>Tipo de Combustible:</strong> <?= Html::encode($vehiculo->tipoCombustible->nombre) ?>
                        </p>
                        <div class="additional-info">
                            <button class="btn btn-primary add-row-btn">+</button>
                            <div class="additional-row" style="display: none;">
                                El vehículo aún no cuenta con reseñas
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?php Modal::begin([
    'options' => [
        'tabindex' => false,
    ],
    'id' => 'modal-res',
    'size' => 'modal-xs',
])

    ?>

<?php Modal::end(); ?>

<style>
    .content-wrapper {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .image-container {
        flex: 1;
    }

    .image-container img {
        max-width: 100%;
        height: auto;
    }

    .text-container {
        flex: 1;
        padding-left: 20px;
    }

    .text-container h1 {
        font-size: 2.5em;
        margin-bottom: 10px;
    }

    .text-container p {
        font-size: 1.2em;
    }

    .vehicles-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;
    }

    .vehicle-card {
        background-color: #fff;
        border: 1px solid #6c757d;
        border-radius: 10px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        width: 300px;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        padding: 20px;
    }

    .card-image {
        width: 100%;
        height: 200px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 15px;
    }

    .vehicle-img {
        max-width: 100%;
        height: auto;
    }

    .card-content h2 {
        font-size: 1.5em;
        margin-bottom: 10px;
    }

    .card-content p {
        margin: 5px 0;
    }

    .card-content p strong {
        font-weight: bold;
    }

    .additional-info {
        margin-top: 10px;
        position: relative;
        width: 100%;
    }

    .additional-row {
        display: none;
        background-color: #f8f9fa;
        padding: 10px;
        margin-top: 10px;
        border-top: 1px solid #dee2e6;
        text-align: left;
    }
</style>

<script>
    $(document).ready(function () {
        $('.add-row-btn').click(function () {
            $(this).next('.additional-row').toggle();
        });
    })

    $(document).on("click", "button-get-resenias", function () {
        $.get($(this).data("url"), function (data) {
            $("#modal-resenia").html(data);
            $("#modal-res").modal("show");
        })
    })

</script>