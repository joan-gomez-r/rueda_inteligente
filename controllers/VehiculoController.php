<?php

namespace app\controllers;

use app\models\Resenia;
use app\models\Vehiculo;
use app\models\VehiculoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use Yii;

/**
 * VehiculoController implements the CRUD actions for Vehiculo model.
 */
class VehiculoController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Vehiculo models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new VehiculoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Vehiculo model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Vehiculo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Vehiculo();

        $this->subirImagen($model);

        return $this->render('create', [
            'model' => $model,
            'marcas' => $model->listMarca(),
            'pais' => $model->listPais(),
            'traccion' => $model->listTraccion(),
            'tipoCombustible' => $model->listTipoCombustible(),
        ]);
    }

    /**
     * Updates an existing Vehiculo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $this->subirImagen($model);

        return $this->render('update', [
            'model' => $model,
            'marcas' => $model->listMarca(),
            'pais' => $model->listPais(),
            'traccion' => $model->listTraccion(),
            'tipoCombustible' => $model->listTipoCombustible(),
        ]);
    }

    /**
     * Deletes an existing Vehiculo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        if (file_exists($model->imagen)) {
            unlink($model->imagen);
        }
        $model->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Vehiculo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Vehiculo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Vehiculo::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function subirImagen(Vehiculo $model)
    {
        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->archivo = UploadedFile::getInstance($model, 'archivo');
                if ($model->validate()) {
                    if ($model->archivo) {
                        if (file_exists($model->imagen)) {
                            unlink($model->imagen);
                        }
                        $ruta = 'uploads/' . time() . '_' . $model->archivo->baseName . '.' . $model->archivo->extension;
                        if ($model->archivo->saveAs($ruta)) {
                            $model->imagen = $ruta;
                        }
                    }
                }
                if ($model->save(false)) {
                    return $this->redirect(['index']);
                }
            }
        } else {
            $model->loadDefaultValues();
        }
    }
    public function actionBuscarVehiculos()
    {
        $lista_vehiculos = Vehiculo::find()->all();
        $vehiculos = new VehiculoSearch();
        $resultado = false;

        if ($this->request->isPost && !empty($this->request->bodyParams)) {
            // Procesar los datos del formulario
            $dataProvider = $vehiculos->search($this->request->bodyParams);
            $resultado = true;
        } else {
            // Mostrar todos los vehículos por defecto
            $dataProvider = $vehiculos->search([]);
        }

        return $this->render('carro_ideal', [
            'lista_vehiculos' => $lista_vehiculos,
            'dataProvider' => $dataProvider,
            'vehiculos' => $vehiculos,
            'resultado' => $resultado
        ]);
    }



    public function actionGetReviews($id)
    {
        $resenas = Resenia::find()->where(['vehiculo_id' => $id])->all();
        if ($resenas !== null) {
            return json_encode(['success' => true, 'reseñas' => $resenas]);
        } else {
            return json_encode(['success' => false, 'error' => 'Vehículo no encontrado']);
        }
    }

}
