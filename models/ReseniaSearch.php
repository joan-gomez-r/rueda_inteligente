<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Resenia;

/**
 * ReseniaSearch represents the model behind the search form of `app\models\Resenia`.
 */
class ReseniaSearch extends Resenia
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'mecanica', 'disenio', 'precio', 'durabilidad', 'kilometraje', 'aprobado', 'vehiculo_id', 'user_id', 'aprobador_id'], 'integer'],
            [['titulo'], 'safe'],
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
        $query = Resenia::find();

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
            'mecanica' => $this->mecanica,
            'disenio' => $this->disenio,
            'precio' => $this->precio,
            'durabilidad' => $this->durabilidad,
            'kilometraje' => $this->kilometraje,
            'aprobado' => $this->aprobado,
            'vehiculo_id' => $this->vehiculo_id,
            'user_id' => $this->user_id,
            'aprobador_id' => $this->aprobador_id,
        ]);

        $query->andFilterWhere(['like', 'titulo', $this->titulo]);

        return $dataProvider;
    }
}
