<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pais".
 *
 * @property int $id
 * @property string $nombre
 *
 * @property Marca[] $marcas
 * @property Vehiculo[] $vehiculos
 */
class Pais extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pais';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 32],
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
        ];
    }

    /**
     * Gets query for [[Marcas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMarcas()
    {
        return $this->hasMany(Marca::class, ['pais_id' => 'id']);
    }

    /**
     * Gets query for [[Vehiculos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVehiculos()
    {
        return $this->hasMany(Vehiculo::class, ['pais_id' => 'id']);
    }
}
