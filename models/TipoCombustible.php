<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipo_combustible".
 *
 * @property int $id
 * @property string $nombre
 *
 * @property Vehiculo[] $vehiculos
 */
class TipoCombustible extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tipo_combustible';
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
     * Gets query for [[Vehiculos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVehiculos()
    {
        return $this->hasMany(Vehiculo::class, ['tipo_combustible_id' => 'id']);
    }
}
