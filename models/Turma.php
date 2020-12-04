<?php

namespace app\models;
use yii\helpers\ArrayHelper;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use DateTime;

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
            [['dt_inicio', 'dt_fim'], 'date', 'format' => 'dd/MM/yyyy'],
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
            'hr_fim' => 'Horário Fim',
            'dt_inicio' => 'Data Inicio',
            'dt_fim' => 'Data Fim',
            'id_profissional' => 'Profissional',
            'id_especialidade' => 'Especialidade',
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
    
     
    public function getDataListEspecialidade() { // could be a static func as well

        $models = Especialidade::find()->asArray()->all();

        return ArrayHelper::map($models, 'id_especialidade', 'nm_especialidade');

    }

    public function getDataListProfissional() { // could be a static func as well

        $models = Profissional::find()->asArray()->all();

        return ArrayHelper::map($models, 'id_profissional', 'nm_profissional');

    }
    
    
    public function behaviors() {
        return [
           
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['dt_inicio'],                  
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['dt_inicio'],
                    
                ],
                'value' => function() {
                    $date = DateTime::createFromFormat('d/m/Y', $this->dt_inicio);
                    return Yii::$app->formatter->asDate($date, 'php:Y-m-d');
                }
            ],
                    
             [
                'class' => TimestampBehavior::className(),
                'attributes' => [                                  
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['dt_fim'],
                    ActiveRecord::EVENT_BEFORE_INSERT => ['dt_fim'],                                                            
                ],
                'value' => function() {
                    $date = DateTime::createFromFormat('d/m/Y', $this->dt_fim);
                    return Yii::$app->formatter->asDate($date, 'php:Y-m-d');
                }
            ],      
     
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_AFTER_FIND => ['dt_inicio'],
                ],
                'value' => function() {
                if($this->dt_inicio != null){
                    return Yii::$app->formatter->asDate($this->dt_inicio, 'dd/MM/yyyy');
                }else{
                    return null;
                }
                }
            ],
                    
                     [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_AFTER_FIND => ['dt_fim'],
                ],
                'value' => function() {
                if($this->dt_fim != null){
                    return Yii::$app->formatter->asDate($this->dt_fim, 'dd/MM/yyyy');
                }else{
                    return null;
                }
                }
            ],
          
        ];
    }
}


