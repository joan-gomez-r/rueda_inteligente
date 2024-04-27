<?php

/** @var yii\web\View $this */

use app\models\Vehiculo;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'My Yii Application';
?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<div class="site-index">

    <div class="body-content">
        <?php foreach ($dataProvider->getModels() as $vehiculo): ?>
            <table class="table table-bordered">
                <tbody>
                    <tr style="border: 2px solid #6c757d; border-radius: 10px; background-color: #f2f3f5;">
                        <td style="width: 200px; background-color: #f2f3f5;">
                            <?= Html::img($vehiculo->imagen, ['width'=>'200px']) ?>
                        </td>
                        <td style="border: none; background-color: #f2f3f5;">
                            <table class="table table-borderless table-sm">
                                <tbody>
                                    <tr>
                                        <td>Marca:</td>
                                        <td><?= Html::encode($vehiculo->marca->nombre) ?></td>
                                    </tr>
                                    <tr>
                                        <td>Línea:</td>
                                        <td><?= Html::encode($vehiculo->nombre) ?></td>
                                    </tr>
                                    <tr>
                                        <td>Año:</td>
                                        <td><?= Html::encode($vehiculo->anio_inicial) ?> - <?= Html::encode($vehiculo->anio_final) ?></td>
                                    </tr>
                                    <tr>
                                        <td>Precio:</td>
                                        <td><?= Html::encode($vehiculo->precio_inicial) ?> - <?= Html::encode($vehiculo->precio_final) ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                        <td style="border: none; background-color: #f2f3f5; position: relative;">
                            <table class="table table-borderless table-sm">
                                <tbody>
                                    <tr>
                                        <td>País:</td>
                                        <td><?= Html::encode($vehiculo->pais->nombre) ?></td>
                                    </tr>
                                    <tr>
                                        <td>Cilindrada:</td>
                                        <td><?= Html::encode($vehiculo->cilindrada) ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tipo de Combustible:</td>
                                        <td><?= Html::encode($vehiculo->tipoCombustible->nombre) ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div style="position: absolute; bottom: 0; right: 0;">
                                <?= Html::button('+', ['class' => 'btn btn-primary add-row-btn']) ?>
                            </div>
                        </td>
                    </tr>
                    <tr class="additional-row" style="display: none;">
                        <td colspan="3">
                            El vehiculo aun no cuenta con reseñas
                        </td>
                    </tr>
                </tbody>
            </table>
        <?php endforeach; ?>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('.add-row-btn').click(function(){
            $(this).closest('tr').next('.additional-row').toggle();
        });
    });
</script>
