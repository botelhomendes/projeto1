<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Avaliacao;

/**
 * AvaliacaoSearch represents the model behind the search form of `app\models\Avaliacao`.
 */
class AvaliacaoSearch extends Avaliacao
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_avaliacao', 'id_cliente', 'nr_cigarro', 'nr_tempo_tabagismo', 'nr_tempo_ex_tabagismo', 'nr_filhos', 'nr_nocturia', 'nr_refeicoes_dia', 'nr_litros_agua_dia'], 'integer'],
            [['nm_cliente', 'ds_ocupacao', 'ds_motivo', 'ds_medicamento', 'ds_patologia', 'ds_cirurgia', 'fl_tabagista', 'ds_comentario_tabagismo', 'ds_doenca_respiratoria', 'ds_comentario_doenca_respiratoria', 'ds_ciclo_cesaria', 'ds_avaliacao_postural', 'fl_relacao_dor', 'fl_relacao_prazer', 'fl_incontinencia', 'ds_valor_braco_dir_esq', 'ds_torax_abdomem', 'ds_quadril_culote', 'ds_coxa_dir_esq', 'fl_endema', 'fl_dor_circulatorio', 'fl_peso', 'ds_comentario_circulatorio', 'fl_restricao', 'ds_comentario_disgestivo', 'ds_flexibilidade', 'ds_imc', 'ds_orientacoes'], 'safe'],
            [['vr_p_a'], 'number'],
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
        $query = Avaliacao::find();

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
            'id_avaliacao' => $this->id_avaliacao,
            'id_cliente' => $this->id_cliente,
            'nr_cigarro' => $this->nr_cigarro,
            'nr_tempo_tabagismo' => $this->nr_tempo_tabagismo,
            'nr_tempo_ex_tabagismo' => $this->nr_tempo_ex_tabagismo,
            'nr_filhos' => $this->nr_filhos,
            'nr_nocturia' => $this->nr_nocturia,
            'vr_p_a' => $this->vr_p_a,
            'nr_refeicoes_dia' => $this->nr_refeicoes_dia,
            'nr_litros_agua_dia' => $this->nr_litros_agua_dia,
        ]);

        $query->andFilterWhere(['like', 'nm_cliente', $this->nm_cliente])
            ->andFilterWhere(['like', 'ds_ocupacao', $this->ds_ocupacao])
            ->andFilterWhere(['like', 'ds_motivo', $this->ds_motivo])
            ->andFilterWhere(['like', 'ds_medicamento', $this->ds_medicamento])
            ->andFilterWhere(['like', 'ds_patologia', $this->ds_patologia])
            ->andFilterWhere(['like', 'ds_cirurgia', $this->ds_cirurgia])
            ->andFilterWhere(['like', 'fl_tabagista', $this->fl_tabagista])
            ->andFilterWhere(['like', 'ds_comentario_tabagismo', $this->ds_comentario_tabagismo])
            ->andFilterWhere(['like', 'ds_doenca_respiratoria', $this->ds_doenca_respiratoria])
            ->andFilterWhere(['like', 'ds_comentario_doenca_respiratoria', $this->ds_comentario_doenca_respiratoria])
            ->andFilterWhere(['like', 'ds_ciclo_cesaria', $this->ds_ciclo_cesaria])
            ->andFilterWhere(['like', 'ds_avaliacao_postural', $this->ds_avaliacao_postural])
            ->andFilterWhere(['like', 'fl_relacao_dor', $this->fl_relacao_dor])
            ->andFilterWhere(['like', 'fl_relacao_prazer', $this->fl_relacao_prazer])
            ->andFilterWhere(['like', 'fl_incontinencia', $this->fl_incontinencia])
            ->andFilterWhere(['like', 'ds_valor_braco_dir_esq', $this->ds_valor_braco_dir_esq])
            ->andFilterWhere(['like', 'ds_torax_abdomem', $this->ds_torax_abdomem])
            ->andFilterWhere(['like', 'ds_quadril_culote', $this->ds_quadril_culote])
            ->andFilterWhere(['like', 'ds_coxa_dir_esq', $this->ds_coxa_dir_esq])
            ->andFilterWhere(['like', 'fl_endema', $this->fl_endema])
            ->andFilterWhere(['like', 'fl_dor_circulatorio', $this->fl_dor_circulatorio])
            ->andFilterWhere(['like', 'fl_peso', $this->fl_peso])
            ->andFilterWhere(['like', 'ds_comentario_circulatorio', $this->ds_comentario_circulatorio])
            ->andFilterWhere(['like', 'fl_restricao', $this->fl_restricao])
            ->andFilterWhere(['like', 'ds_comentario_disgestivo', $this->ds_comentario_disgestivo])
            ->andFilterWhere(['like', 'ds_flexibilidade', $this->ds_flexibilidade])
            ->andFilterWhere(['like', 'ds_imc', $this->ds_imc])
            ->andFilterWhere(['like', 'ds_orientacoes', $this->ds_orientacoes]);

        return $dataProvider;
    }
}
