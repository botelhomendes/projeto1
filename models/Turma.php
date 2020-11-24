<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_turma".
 *
 * @property int $id_turma
 * @property string $nm_turma
 * @property string $ds_turno
 * @property int $nr_vagas
 * @property string $hr_inicio
 * @property string $hr_fim
 * @property string $dt_inicio
 * @property string $dt_fim
 * @property int $id_profissional
 * @property int $id_especialidade
 *
 * @property TbEspecialidade $especialidade
 * @property TbProfissional $profissional
 */
class Turma extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_turma';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nm_turma', 'ds_turno', 'nr_vagas', 'hr_inicio', 'hr_fim', 'dt_inicio', 'dt_fim', 'id_profissional', 'id_especialidade'], 'required'],
            [['nr_vagas', 'id_profissional', 'id_especialidade'], 'integer'],
            [['hr_inicio', 'hr_fim', 'dt_inicio', 'dt_fim'], 'safe'],
            [['nm_turma'], 'string', 'max' => 200],
            [['ds_turno'], 'string', 'max' => 100],
            [['id_especialidade'], 'exist', 'skipOnError' => true, 'targetClass' => Especialidade::className(), 'targetAttribute' => ['id_especialidade' => 'id_especialidade']],
            [['id_profissional'], 'exist', 'skipOnError' => true, 'targetClass' => Profissional::className(), 'targetAttribute' => ['id_profissional' => 'id_profissional']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_turma' => 'Código da Turma',
            'nm_turma' => 'Nome da Turma',
            'ds_turno' => 'Turno',
            'nr_vagas' => 'Número de Vagas',
            'hr_inicio' => 'Horário Inicio',
            'hr_fim' => 'Horário Inicio',
            'dt_inicio' => 'Data Inicio',
            'dt_fim' => 'Data Fim',
            'id_profissional' => 'Id Profissional',
            'id_especialidade' => 'Id Especialidade',
        ];
    }

    /**
     * Gets query for [[Especialidade]].
     *
     * @return \yii\db\ActiveQuery|TbEspecialidadeQuery
     */
    public function getEspecialidade()
    {
        return $this->hasOne(Especialidade::className(), ['id_especialidade' => 'id_especialidade']);
    }

    /**
     * Gets query for [[Profissional]].
     *
     * @return \yii\db\ActiveQuery|TbProfissionalQuery
     */
    public function getProfissional()
    {
        return $this->hasOne(Profissional::className(), ['id_profissional' => 'id_profissional']);
    }

    /**
     * {@inheritdoc}
     * @return TurmaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TurmaQuery(get_called_class());
    }
}
