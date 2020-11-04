<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_avaliacao".
 *
 * @property int $id_avaliacao
 * @property int $id_cliente
 * @property string $nm_cliente
 * @property string $ds_ocupacao
 * @property string $ds_motivo
 * @property string $ds_medicamento
 * @property string $ds_patologia
 * @property string $ds_cirurgia
 * @property string $fl_tabagista
 * @property int $nr_cigarro
 * @property int $nr_tempo_tabagismo
 * @property int $nr_tempo_ex_tabagismo
 * @property string $ds_comentario_tabagismo
 * @property string $ds_doenca_respiratoria
 * @property string $ds_comentario_doenca_respiratoria
 * @property int $nr_filhos
 * @property string $ds_ciclo_cesaria quantidade de vezes que acorda pra fazer xixi
 * @property int $nr_nocturia
 * @property string $ds_avaliacao_postural
 * @property float $vr_p_a
 * @property string $fl_relacao_dor
 * @property string $fl_relacao_prazer
 * @property string $fl_incontinencia
 * @property string $ds_valor_braco_dir_esq
 * @property string $ds_torax_abdomem
 * @property string $ds_quadril_culote
 * @property string $ds_coxa_dir_esq
 * @property string $fl_endema
 * @property string $fl_dor_circulatorio
 * @property string $fl_peso
 * @property string $ds_comentario_circulatorio
 * @property string $fl_restricao
 * @property string $ds_comentario_disgestivo
 * @property int $nr_refeicoes_dia
 * @property int $nr_litros_agua_dia
 * @property string $ds_flexibilidade
 * @property string $ds_imc
 * @property string $ds_orientacoes
 *
 * @property TbCadastroCliente $cliente
 */
class Avaliacao extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_avaliacao';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_cliente', 'nm_cliente', 'ds_ocupacao', 'ds_motivo', 'ds_medicamento', 'ds_patologia', 'ds_cirurgia', 'fl_tabagista', 'nr_cigarro', 'nr_tempo_tabagismo', 'nr_tempo_ex_tabagismo', 'ds_comentario_tabagismo', 'ds_doenca_respiratoria', 'ds_comentario_doenca_respiratoria', 'nr_filhos', 'ds_ciclo_cesaria', 'nr_nocturia', 'ds_avaliacao_postural', 'vr_p_a', 'fl_relacao_dor', 'fl_relacao_prazer', 'fl_incontinencia', 'ds_valor_braco_dir_esq', 'ds_torax_abdomem', 'ds_quadril_culote', 'ds_coxa_dir_esq', 'fl_endema', 'fl_dor_circulatorio', 'fl_peso', 'ds_comentario_circulatorio', 'fl_restricao', 'ds_comentario_disgestivo', 'nr_refeicoes_dia', 'nr_litros_agua_dia', 'ds_flexibilidade', 'ds_imc', 'ds_orientacoes'], 'required'],
            [['id_cliente', 'nr_cigarro', 'nr_tempo_tabagismo', 'nr_tempo_ex_tabagismo', 'nr_filhos', 'nr_nocturia', 'nr_refeicoes_dia', 'nr_litros_agua_dia'], 'integer'],
            [['vr_p_a'], 'number'],
            [['nm_cliente', 'ds_ocupacao', 'ds_motivo', 'ds_medicamento', 'ds_patologia', 'ds_cirurgia', 'ds_comentario_tabagismo', 'ds_doenca_respiratoria', 'ds_comentario_doenca_respiratoria', 'ds_ciclo_cesaria', 'ds_avaliacao_postural', 'ds_valor_braco_dir_esq', 'ds_torax_abdomem', 'ds_quadril_culote', 'ds_coxa_dir_esq', 'ds_comentario_circulatorio', 'ds_comentario_disgestivo', 'ds_flexibilidade', 'ds_imc', 'ds_orientacoes'], 'string', 'max' => 200],
            [['fl_tabagista', 'fl_relacao_dor', 'fl_relacao_prazer', 'fl_incontinencia', 'fl_endema', 'fl_dor_circulatorio', 'fl_peso', 'fl_restricao'], 'string', 'max' => 3],
            [['id_cliente'], 'exist', 'skipOnError' => true, 'targetClass' => CadastroCliente::className(), 'targetAttribute' => ['id_cliente' => 'id_cliente']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_avaliacao' => 'Id Avaliacao',
            'id_cliente' => 'Código do Paciente',
            'nm_cliente' => 'Nome do Paciente',
            'ds_ocupacao' => 'Ocupação',
            'ds_motivo' => 'Motivo',
            'ds_medicamento' => 'Medicamentos utilizados',
            'ds_patologia' => 'Patologia',
            'ds_cirurgia' => 'Cirurgias feitas',
            'fl_tabagista' => 'Tabagista',
            'nr_cigarro' => 'Quantidade de cigarros',
            'nr_tempo_tabagismo' => 'Tempo de Tabagismo',
            'nr_tempo_ex_tabagismo' => 'Nr Tempo Ex Tabagismo',
            'ds_comentario_tabagismo' => 'Ds Comentario Tabagismo',
            'ds_doenca_respiratoria' => 'Ds Doenca Respiratoria',
            'ds_comentario_doenca_respiratoria' => 'Ds Comentario Doenca Respiratoria',
            'nr_filhos' => 'Nr Filhos',
            'ds_ciclo_cesaria' => 'Ds Ciclo Cesaria',
            'nr_nocturia' => 'Nr Nocturia',
            'ds_avaliacao_postural' => 'Ds Avaliacao Postural',
            'vr_p_a' => 'Vr P A',
            'fl_relacao_dor' => 'Fl Relacao Dor',
            'fl_relacao_prazer' => 'Fl Relacao Prazer',
            'fl_incontinencia' => 'Fl Incontinencia',
            'ds_valor_braco_dir_esq' => 'Ds Valor Braco Dir Esq',
            'ds_torax_abdomem' => 'Ds Torax Abdomem',
            'ds_quadril_culote' => 'Ds Quadril Culote',
            'ds_coxa_dir_esq' => 'Ds Coxa Dir Esq',
            'fl_endema' => 'Fl Endema',
            'fl_dor_circulatorio' => 'Fl Dor Circulatorio',
            'fl_peso' => 'Fl Peso',
            'ds_comentario_circulatorio' => 'Ds Comentario Circulatorio',
            'fl_restricao' => 'Fl Restricao',
            'ds_comentario_disgestivo' => 'Ds Comentario Disgestivo',
            'nr_refeicoes_dia' => 'Nr Refeicoes Dia',
            'nr_litros_agua_dia' => 'Nr Litros Agua Dia',
            'ds_flexibilidade' => 'Ds Flexibilidade',
            'ds_imc' => 'Ds Imc',
            'ds_orientacoes' => 'Ds Orientacoes',
        ];
    }

    /**
     * Gets query for [[Cliente]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCliente()
    {
        return $this->hasOne(TbCadastroCliente::className(), ['id_cliente' => 'id_cliente']);
    }
}
