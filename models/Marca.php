<?php

namespace app\models;
use yii\helpers\ArrayHelper;

use Yii;

/**
 * This is the model class for table "marca".
 *
 * @property int $id
 * @property string $nombre
 * @property int $pais_id
 *
 * @property Pais $pais
 * @property Vehiculo[] $vehiculos
 */
class Marca extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'marca';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'pais_id'], 'required'],
            [['pais_id'], 'integer'],
            [['nombre'], 'string', 'max' => 32],
            [['pais_id'], 'exist', 'skipOnError' => true, 'targetClass' => Pais::class, 'targetAttribute' => ['pais_id' => 'id']],
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
            'pais_id' => 'Pais',
        ];
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
     * Gets query for [[Vehiculos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVehiculos()
    {
        return $this->hasMany(Vehiculo::class, ['marca_id' => 'id']);
    }

    public function toList(){
        $array = Marca::find()->select("id, nombre")->asArray()->all();
        return ArrayHelper::map($array, 'id', 'nombre');
    }

    public function listPais(){
        $array = Pais::find()->select("id, nombre")->asArray()->all();
        return ArrayHelper::map($array, 'id', 'nombre');
    }
}
