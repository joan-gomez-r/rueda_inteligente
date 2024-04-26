<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "traccion".
 *
 * @property int $id
 * @property string $nombre
 * @property string $uso
 *
 * @property Vehiculo[] $vehiculos
 */
class Traccion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'traccion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'uso'], 'required'],
            [['nombre', 'uso'], 'string', 'max' => 32],
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
            'uso' => 'Uso',
        ];
    }

    /**
     * Gets query for [[Vehiculos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVehiculos()
    {
        return $this->hasMany(Vehiculo::class, ['traccion_id' => 'id']);
    }
}
