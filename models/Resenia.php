<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "resenia".
 *
 * @property int $id
 * @property string $titulo
 * @property int $mecanica
 * @property int $disenio
 * @property int $precio
 * @property int $durabilidad
 * @property int $kilometraje
 * @property int $aprobado
 * @property int $vehiculo_id
 * @property int $user_id
 * @property int $aprobador_id
 *
 * @property Vehiculo $vehiculo
 */
class Resenia extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'resenia';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['titulo', 'mecanica', 'disenio', 'precio', 'durabilidad', 'kilometraje', 'vehiculo_id', 'user_id', 'aprobador_id'], 'required'],
            [['mecanica', 'disenio', 'precio', 'durabilidad', 'kilometraje', 'aprobado', 'vehiculo_id', 'user_id', 'aprobador_id'], 'integer'],
            [['titulo'], 'string', 'max' => 128],
            [['vehiculo_id'], 'exist', 'skipOnError' => true, 'targetClass' => Vehiculo::class, 'targetAttribute' => ['vehiculo_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'titulo' => 'Titulo',
            'mecanica' => 'Mecanica',
            'disenio' => 'Disenio',
            'precio' => 'Precio',
            'durabilidad' => 'Durabilidad',
            'kilometraje' => 'Kilometraje',
            'aprobado' => 'Aprobado',
            'vehiculo_id' => 'Vehiculo ID',
            'user_id' => 'User ID',
            'aprobador_id' => 'Aprobador ID',
        ];
    }

    /**
     * Gets query for [[Vehiculo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVehiculo()
    {
        return $this->hasOne(Vehiculo::class, ['id' => 'vehiculo_id']);
    }
}
