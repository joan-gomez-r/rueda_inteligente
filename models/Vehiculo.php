<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "vehiculo".
 *
 * @property int $id
 * @property string $nombre
 * @property string $anio_inicial
 * @property string|null $anio_final
 * @property int $hp
 * @property int $torque
 * @property float $precio_inicial
 * @property float $precio_final
 * @property int $peso
 * @property int $largo
 * @property int $ancho
 * @property int $alto
 * @property int $altura_suelo
 * @property int $no_pasajeros
 * @property int $capacidad_maletero
 * @property int $consumo
 * @property float $cilindrada
 * @property int $turbo
 * @property int $electrico
 * @property int $hibrido
 * @property int $pais_id
 * @property int $marca_id
 * @property int $tipo_combustible_id
 * @property int $traccion_id
 * @property string|null $imagen
 *
 * @property Marca $marca
 * @property Pais $pais
 * @property Resenia[] $resenias
 * @property TipoCombustible $tipoCombustible
 * @property Traccion $traccion
 */
class Vehiculo extends \yii\db\ActiveRecord
{
    public $archivo;    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vehiculo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'anio_inicial', 'hp', 'torque', 'precio_inicial', 'precio_final', 'peso', 'largo', 'ancho', 'alto', 'altura_suelo', 'no_pasajeros', 'capacidad_maletero', 'consumo', 'cilindrada', 'pais_id', 'marca_id', 'tipo_combustible_id', 'traccion_id'], 'required'],
            [['anio_inicial', 'anio_final'], 'safe'],
            [['hp', 'torque', 'peso', 'largo', 'ancho', 'alto', 'altura_suelo', 'no_pasajeros', 'capacidad_maletero', 'consumo', 'turbo', 'electrico', 'hibrido', 'pais_id', 'marca_id', 'tipo_combustible_id', 'traccion_id'], 'integer'],
            [['precio_inicial', 'precio_final', 'cilindrada'], 'number'],
            [['nombre'], 'string', 'max' => 32],
            //[['imagen'], 'string', 'max' => 2500],
            [['archivo'], 'file', 'extensions' => 'png'],
            [['pais_id'], 'exist', 'skipOnError' => true, 'targetClass' => Pais::class, 'targetAttribute' => ['pais_id' => 'id']],
            [['marca_id'], 'exist', 'skipOnError' => true, 'targetClass' => Marca::class, 'targetAttribute' => ['marca_id' => 'id']],
            [['tipo_combustible_id'], 'exist', 'skipOnError' => true, 'targetClass' => TipoCombustible::class, 'targetAttribute' => ['tipo_combustible_id' => 'id']],
            [['traccion_id'], 'exist', 'skipOnError' => true, 'targetClass' => Traccion::class, 'targetAttribute' => ['traccion_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'anio_inicial' => 'Año Inicial',
            'anio_final' => 'Año Final',
            'hp' => 'Hp',
            'torque' => 'Torque(Nm)',
            'precio_inicial' => 'Precio Inicial',
            'precio_final' => 'Precio Final',
            'peso' => 'Peso(Kg)',
            'largo' => 'Largo(mm)',
            'ancho' => 'Ancho(mm)',
            'alto' => 'Alto(mm)',
            'altura_suelo' => 'Altura Suelo(mm)',
            'no_pasajeros' => 'No Pasajeros',
            'capacidad_maletero' => 'Capacidad Maletero(lt)',
            'consumo' => 'Consumo',
            'cilindrada' => 'Cilindrada(lt)',
            'turbo' => 'Turbo',
            'electrico' => 'Electrico',
            'hibrido' => 'Hibrido',
            'pais_id' => 'Pais',
            'marca_id' => 'Marca',
            'tipo_combustible_id' => 'Tipo Combustible',
            'traccion_id' => 'Traccion',
            'archivo' => 'Imagen',
        ];
    }

    /**
     * Gets query for [[Marca]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMarca()
    {
        return $this->hasOne(Marca::class, ['id' => 'marca_id']);
    }

    /**
     * Gets query for [[Pais]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPais()
    {
        return $this->hasOne(Pais::class, ['id' => 'pais_id']);
    }

    /**
     * Gets query for [[Resenias]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getResenias()
    {
        return $this->hasMany(Resenia::class, ['vehiculo_id' => 'id']);
    }

    /**
     * Gets query for [[TipoCombustible]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTipoCombustible()
    {
        return $this->hasOne(TipoCombustible::class, ['id' => 'tipo_combustible_id']);
    }

    /**
     * Gets query for [[Traccion]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTraccion()
    {
        return $this->hasOne(Traccion::class, ['id' => 'traccion_id']);
    }

    public function listMarca(){
        $array = Marca::find()->select("id, nombre")->asArray()->all();
        return ArrayHelper::map($array, 'id', 'nombre');
    }
    public function listPais(){
        $array = Pais::find()->select("id, nombre")->asArray()->all();
        return ArrayHelper::map($array, 'id', 'nombre');
    }
    public function listTipoCombustible(){
        $array = TipoCombustible::find()->select("id, nombre")->asArray()->all();
        return ArrayHelper::map($array, 'id', 'nombre');
    }

    public function listTraccion(){
        $array = Traccion::find()->select("id, nombre")->asArray()->all();
        return ArrayHelper::map($array, 'id', 'nombre');
    }
}
