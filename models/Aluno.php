<?php

namespace app\models;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\grid\GridView;

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
            [['nm_aluno', 'ds_cpf', 'dt_nascimento', 'ds_sexo', 'ds_identidade', 'ds_responsaveis', 'ds_estado', 'ds_cidade', 'ds_endereco', 'ds_cep', 'ds_email', 'ds_profissao', 'ds_telefone1', 'ds_telefone2', 'ds_whatsapp', 'id_convenio'], 'required'],
            [['dt_nascimento'], 'date', 'format' => 'yyyy-MM-dd'],
            [['ds_telefone1', 'ds_telefone2', 'ds_whatsapp', 'id_convenio'], 'integer'],
            [['nm_aluno', 'ds_responsaveis', 'ds_cidade', 'ds_endereco', 'ds_email'], 'string', 'max' => 200],
            [['ds_cpf'], 'string', 'max' => 11],
            [['ds_sexo'], 'string', 'max' => 1],
            [['ds_identidade'], 'string', 'max' => 50],
            [['ds_estado'], 'string', 'max' => 2],
            [['ds_cep'], 'string', 'max' => 10],
            [['ds_profissao'], 'string', 'max' => 100],
            [['id_convenio'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Código do Aluno',
            'nm_aluno' => 'Nome do Aluno',
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
            'id_convenio' => 'Código do Convenio',
        ];
    }
    
    public function  getNavBar(){
        NavBar::begin([
        'brandLabel' => 'Academia Harmonia Faz Bem',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems[] = ['label' => '<i class="glyphicon glyphicon-user"></i> Search', 'url' => ['/site/search']];
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Cadastros', 'url' => ['/site/index'],
                'items' => [
                    ['label' => 'Aluno', 'url' => ['/aluno/index']],
                    ['label' => 'Profissional', 'url' => ['/profissional/create']],
                    ['label' => 'Turma', 'url' => ['/aluno/create']],
                    ['label' => 'Avaliação', 'url' => ['/avaliacao/create']]
                ]
            ],
            ['label' => 'Relatórios', 'url' => ['/site/about'],
                'items' => [
                    ['label' => 'Aluno', 'url' => ['/aluno/relatorio']],
                    ['label' => 'Profissional', 'url' => ['/aluno/create']],
                    ['label' => 'Turma', 'url' => ['/aluno/create']]
                ]
            ],
            Yii::$app->user->isGuest ?
                    ['label' => 'Login', 'url' => ['/site/login']] :
                    [
                'label' => '<i class="glyphicon glyphicon-user"></i> Sair (' . Yii::$app->user->identity->username . ')',
                'url' => ['/site/logout'],
                'linkOptions' => ['data-method' => 'post']
                    ],
        ],
        'encodeLabels' => false,
    ]);

    NavBar::end();
    }
}
