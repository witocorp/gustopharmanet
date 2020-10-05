<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Productos;

/**
 * ProductosSearch represents the model behind the search form of `backend\models\Productos`.
 */
class ProductosSearch extends Productos
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'idMarca'], 'integer'],
            [['producto', 'url'], 'safe'],
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
        $query = Productos::find();

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
            'idMarca' => $this->idMarca,
        ]);

        $query->andFilterWhere(['like', 'producto', $this->producto])
            ->andFilterWhere(['like', 'url', $this->url]);

        return $dataProvider;
    }
}