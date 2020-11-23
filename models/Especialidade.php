<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_especialidade".
 *
 * @property int $id_especialidade
 * @property int $nm_especialidade
 * @property int $nr_tempo_duracao
 * @property int $id_especialidade_profissional
 *
 * @property TbEspecialidadeProfissional[] $tbEspecialidadeProfissionals
 * @property TbTurma[] $tbTurmas
 */
class Especialidade extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_especialidade';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nm_especialidade', 'nr_tempo_duracao', 'id_especialidade_profissional'], 'required'],
             [['nm_especialidade'], 'string', 'max' => 100],
            [['nr_tempo_duracao', 'id_especialidade_profissional'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_especialidade' => 'Id Especialidade',
            'nm_especialidade' => 'Nm Especialidade',
            'nr_tempo_duracao' => 'Nr Tempo Duracao',
            'id_especialidade_profissional' => 'Id Especialidade Profissional',
        ];
    }

    /**
     * Gets query for [[TbEspecialidadeProfissionals]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTbEspecialidadeProfissionals()
    {
        return $this->hasMany(TbEspecialidadeProfissional::className(), ['id_especialidade' => 'id_especialidade_profissional']);
    }

    /**
     * Gets query for [[TbTurmas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTbTurmas()
    {
        return $this->hasMany(TbTurma::className(), ['id_especialidade' => 'id_especialidade']);
    }
}
