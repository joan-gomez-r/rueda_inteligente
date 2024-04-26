<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Vehiculo;

/**
 * VehiculoSearch represents the model behind the search form of `app\models\Vehiculo`.
 */
class VehiculoSearch extends Vehiculo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'hp', 'torque', 'peso', 'largo', 'ancho', 'alto', 'altura_suelo', 'no_pasajeros', 'capacidad_maletero', 'consumo', 'turbo', 'electrico', 'hibrido', 'pais_id', 'marca_id', 'tipo_combustible_id', 'traccion_id'], 'integer'],
            [['nombre', 'anio_inicial', 'anio_final', 'imagen'], 'safe'],
            [['precio_inicial', 'precio_final', 'cilindrada'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Vehiculo::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'anio_inicial' => $this->anio_inicial,
            'anio_final' => $this->anio_final,
            'hp' => $this->hp,
            'torque' => $this->torque,
            'precio_inicial' => $this->precio_inicial,
            'precio_final' => $this->precio_final,
            'peso' => $this->peso,
            'largo' => $this->largo,
            'ancho' => $this->ancho,
            'alto' => $this->alto,
            'altura_suelo' => $this->altura_suelo,
            'no_pasajeros' => $this->no_pasajeros,
            'capacidad_maletero' => $this->capacidad_maletero,
            'consumo' => $this->consumo,
            'cilindrada' => $this->cilindrada,
            'turbo' => $this->turbo,
            'electrico' => $this->electrico,
            'hibrido' => $this->hibrido,
            'pais_id' => $this->pais_id,
            'marca_id' => $this->marca_id,
            'tipo_combustible_id' => $this->tipo_combustible_id,
            'traccion_id' => $this->traccion_id,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'imagen', $this->imagen]);

        return $dataProvider;
    }
}
