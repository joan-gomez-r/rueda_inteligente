<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use kartik\sidenav\SideNav;
use mdm\admin\components\Helper;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body class="d-flex flex-column h-100">
    <?php $this->beginBody() ?>

    <header id="header">
        <?php
        NavBar::begin([
            'brandLabel' => Html::img('@web/images/logo.png', ['alt' => 'RuedaInteligente', 'style' => 'height: 50px; margin-right: 10px;']) . 'RuedaInteligente',
            'brandUrl' => Yii::$app->homeUrl,
            'options' => ['class' => 'navbar-expand-lg navbar-light bg-light fixed-top']
        ]);
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav'],
            'items' => [
                ['label' => 'Inicio', 'url' => ['/site/index']],
                ['label' => 'Encuentra tu carro ideal', 'url' => ['/vehiculo/buscar-vehiculos']],
                Yii::$app->user->isGuest
                ? ['label' => 'Regístrate', 'url' => ['/admin/user/signup']] : "",
                Yii::$app->user->isGuest
                ? ['label' => 'Inicia Sesión', 'url' => ['/admin/user/login']]
                : '<li class="nav-item">'
                . Html::beginForm(['/site/logout'])
                . Html::submitButton(
                    'Cerrar Sesión (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'nav-link']
                )
                . Html::endForm()
                . '</li>'
            ],

        ]);
        NavBar::end();
        ?>
    </header>


    <div class="container-fluid d-flex" style="margin-top: 70px;">
        <div class="col-lg-2">
            <nav class="sidenav mt-4">
                <?php
                echo SideNav::widget([
                    'type' => SideNav::TYPE_DEFAULT,
                    'encodeLabels' => false,
                    'heading' => '<strong>Opciones</strong>',
                    'items' => [
                        ['label' => 'Inicio', 'icon' => 'home', 'url' => Yii::$app->homeUrl, 'active' => false],
                        [
                            'label' => 'Gestionar Reseñas',
                            'icon' => 'check',
                            'visible' => Helper::checkRoute('/resenia/*'),
                            'url' => ['/resenia'],
                            'active' => false
                        ],
                        [
                            'label' => 'Funciones Administrativas',
                            'icon' => 'users',
                            'visible' => Helper::checkRoute('/admin/default/*'),
                            'items' => [
                                [
                                    'label' => 'Asignaciones',
                                    'url' => ['/admin'],
                                    'active' => false,
                                ],
                                [
                                    'label' => 'Permisos',
                                    'url' => ['/admin/permission'],
                                    'active' => false
                                ],
                                [
                                    'label' => 'Rutas',
                                    'url' => ['/admin/route'],
                                    'active' => false
                                ],
                                [
                                    'label' => 'Roles',
                                    'url' => ['/admin/role'],
                                    'active' => false
                                ],
                                [
                                    'label' => 'Usuarios',
                                    'url' => ['/admin/user'],
                                    'active' => false
                                ],
                            ]
                        ],
                    ],
                ]);
                ?>
            </nav>
        </div>
        <div class="col-lg-10">
            <main id="main" class="flex-shrink-0 flex-grow-1" role="main">
                <div class="container">
                    <?php if (!empty($this->params['breadcrumbs'])): ?>
                        <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
                    <?php endif ?>

                    <?= Alert::widget() ?>


                    <?= $content ?>
                </div>

            </main>
        </div>
    </div>

    <footer id="footer" class="mt-auto py-3 bg-light">
        <div class="container">
            <div class="row text-muted">
                <div class="col-md-6 text-center text-md-start">&copy; Rueda Inteligente <?= date('Y') ?></div>
                <div class="col-md-6 text-center text-md-end"><?= Yii::powered() ?></div>
            </div>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>