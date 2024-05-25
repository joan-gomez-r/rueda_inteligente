<?php
use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;
use yii\widgets\ListView;

$this->title = 'Encuentra tu carro ideal';
$this->params['breadcrumbs'][] = $this->title;

?>

<div style="text-align: center;">
    <h1 style="font-size: 3em;"> ¿Buscamos tu carro ideal? </h1>
    &nbsp
    <h4> A continuación te invitamos a responder las siguientes preguntas para ayudarte a encontrar tu carro ideal:
    </h4>
</div>


<div class="form-carroideal">
    <?= $this->render('buscar_vehiculo', ['vehiculos' => $vehiculos]) ?>
</div>

<?php if ($resultado): ?>
    <h2 style="text-align: center;">Estos son tus carros ideales: </h2>
    <div class="vehicles-container">
        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => '_vehicle_card',
        ]) ?>
    </div>
<?php endif; ?>


<div style="text-align: center; margin-top: 30px;">
    <hr style="border-top: 1px solid #ccc; width: 100%;">
    <h2> También te podrían interesar: </h2>
    &nbsp
</div>

<div class="vehicles-container">
    <?php if (isset($lista_vehiculos)): ?>
        <?php foreach ($lista_vehiculos as $index => $v): ?>
            <div class="vehicle-card">
                <div class="card-image">
                    <?= Html::img($v->imagen, ['class' => 'vehicle-img']) ?>
                </div>
                <div class="card-content">
                    <h2><?= $v->marca->nombre ?>         <?= $v->nombre ?></h2>
                    <p><strong>Año:</strong> <?= Html::encode($v->anio_inicial) ?> -
                        <?= Html::encode($v->anio_final) ?>
                    </p>
                    <p><strong>Precio:</strong> <?= Html::encode($v->precio_inicial) ?> -
                        <?= Html::encode($v->precio_final) ?>
                    </p>
                    <p><strong>País:</strong> <?= Html::encode($v->pais->nombre) ?></p>
                    <p><strong>Cilindrada:</strong> <?= Html::encode($v->cilindrada) ?></p>
                    <p><strong>Tipo de Combustible:</strong> <?= Html::encode($v->tipoCombustible->nombre) ?>
                    </p>
                    <div class="additional-info">
                        <button class="btn btn-primary add-row-btn">+</button>
                        <div class="additional-row" style="display: none;">
                            El vehiculo aun no cuenta con reseñas
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    <?php else: ?>
        <h4> Lo lamentamos, no pudimos encontrar tu carro ideal :c </h4>
    <?php endif; ?>

</div>
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