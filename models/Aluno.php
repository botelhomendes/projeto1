<?php

namespace app\models;

use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\ArrayHelper;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use DateTime;

use Yii;

/**
 * This is the model class for table "tb_aluno".
 *
 * @property int $id
 * @property string $nm_aluno
 * @property string $ds_cpf
 * @property string $dt_nascimento
 * @property string $ds_sexo
 * @property string $ds_identidade
 * @property string $ds_responsaveis
 * @property string $ds_estado
 * @property string $ds_cidade
 * @property string $ds_endereco
 * @property string $ds_cep
 * @property string $ds_email
 * @property string $ds_profissao
 * @property int $ds_telefone1
 * @property int $ds_telefone2
 * @property int $ds_whatsapp
 * @property int $id_convenio
 */
class Aluno extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_aluno';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
      
        return [
         //   [['nm_aluno', 'ds_cpf', 'dt_nascimento', 'ds_sexo', 'ds_identidade', 'ds_responsaveis', 'ds_estado', 'ds_cidade', 'ds_endereco', 'ds_cep', 'ds_email', 'ds_profissao', 'ds_telefone1', 'ds_telefone2', 'ds_whatsapp'], 'required'],  
            
            [['dt_nascimento'], 'date', 'format' => 'dd/MM/yyyy'],
            [['ds_telefone1', 'ds_telefone2', 'ds_whatsapp', 'id_convenio'], 'integer'],
            [['nm_aluno', 'ds_responsaveis', 'ds_cidade', 'ds_endereco', 'ds_email'], 'string', 'max' => 200],
            [['ds_cpf'], 'string', 'max' => 11],
            [['ds_sexo'], 'string', 'max' => 100],
            [['ds_identidade'], 'string', 'max' => 50],
            [['ds_estado'], 'string', 'max' => 2],
            [['ds_cep'], 'string', 'max' => 10],
            [['ds_profissao'], 'string', 'max' => 100],
            [['id_convenio'], 'integer'],
            [['fl_paciente'], 'string', 'max' => 1],
            [['nr_matricula_conv'], 'integer'],
            [['dt_validade'], 'date', 'format' => 'yyyy-MM-dd'],
            [['ds_observacao'], 'string', 'max' => 200],
            [['im_foto'], 'string'],
            [['id_convenio'], 'string'],
            [['id_profissional'], 'integer'],
            [['ds_local_foto'], 'string']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Código do Aluno',
            'nm_aluno' => 'Nome do Aluno/Paciente',
            'ds_cpf' => 'Cpf',
            'dt_nascimento' => 'Data de Nascimento',
            'ds_sexo' => 'Sexo',
            'ds_identidade' => 'RG',
            'ds_responsaveis' => 'Responsável',
            'ds_estado' => 'Estado',
            'ds_cidade' => 'Cidade',
            'ds_endereco' => 'Endereco',
            'ds_cep' => 'Cep',
            'ds_email' => 'Email',
            'ds_profissao' => 'Profissao',
            'ds_telefone1' => 'Telefone 1',
            'ds_telefone2' => 'Telefone 2',
            'ds_whatsapp' => 'Whatsapp',
            'id_convenio' => 'Convênio',
            'fl_paciente' => 'Paciente',
            'nr_matricula_conv' => 'Matrícula',
            'dt_validade' => 'Validade',
            'ds_observacao' => 'Observação',
            'im_foto' => 'Foto',            
            'id_profissional' => 'Profissional'
        ];
    }
    
    
    
    public function getEstados(){
        return $estados =  ['MG' => 'MG', 
                            'AC' => 'AC', 
                            'AL' => 'AC', 
                            'AM' => 'AM',
                            'AP' => 'AP',
                            'BA' => 'BA', 
                            'CE' => 'CE', 
                            'DF' => 'DF', 
                            'ES' => 'ES', 
                            'GO' => 'GO', 
                            'MA' => 'MA',  
                            'MT' => 'MT', 
                            'MS' => 'MS',                             
                            'PA' => 'PA', 
                            'PB' => 'PB', 
                            'PR' => 'PR',   
                            'PE' => 'PE', 
                            'PI' => 'PI', 
                            'RJ' => 'RJ', 
                            'RN' => 'RN', 
                            'RO' => 'RO', 
                            'RS' => 'RS', 
                            'RR' => 'RR', 
                            'SC' => 'SC', 
                            'SE' => 'SE', 
                            'SP' => 'SP', 
                            'TO' => 'TO'];
    }
    
      public function getDataListConvenio() { // could be a static func as well
       
        $models = Convenio::find()->asArray()->all();
        array_unshift ($models, new Convenio);
        return ArrayHelper::map($models, 'id', 'ds_nome');

    }

    public function getDataListProfissional() { // could be a static func as well
        
                      
        $models = Profissional::find()->asArray()->all();
        array_unshift ($models, new Profissional);
        return ArrayHelper::map($models, 'id_profissional', 'nm_profissional');

    }
    
    
    
   public function behaviors()
   {
       return [
           [
               'class' =>TimestampBehavior::className(),
               'attributes' => [
                   ActiveRecord::EVENT_BEFORE_INSERT => ['dt_nascimento'],
                   ActiveRecord::EVENT_BEFORE_UPDATE => ['dt_nascimento'],                   
               ],
               'value' => function() { 
           $date = DateTime::createFromFormat('d/m/Y', $this->dt_nascimento);
           return Yii::$app->formatter->asDate($date, 'php:Y-m-d'); }
           ],
                   
                   [
               'class' =>TimestampBehavior::className(),
               'attributes' => [               
                    ActiveRecord::EVENT_AFTER_FIND => ['dt_nascimento'],
                                   
               ],
               'value' => function() {          
            return Yii::$app->formatter->asDate($this->dt_nascimento, 'dd/MM/yyyy'); }
           ],
          
       ];
   }
    
}
