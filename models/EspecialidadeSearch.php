<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Especialidade;

/**
 * EspecialidadeSearch represents the model behind the search form of `app\models\Especialidade`.
 */
class EspecialidadeSearch extends Especialidade
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_especialidade', 'nm_especialidade', 'nr_tempo_duracao', 'id_especialidade_profissional'], 'integer'],
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
        $query = Especialidade::find();

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
            'id_especialidade' => $this->id_especialidade,
            'nm_especialidade' => $this->nm_especialidade,
            'nr_tempo_duracao' => $this->nr_tempo_duracao,
            'id_especialidade_profissional' => $this->id_especialidade_profissional,
        ]);

        return $dataProvider;
    }
}
