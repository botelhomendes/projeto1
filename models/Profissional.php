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
 * This is the model class for table "tb_profissional".
 *
 * @property int $id_profissional
 * @property string $nm_profissional
 * @property string $tp_registro
 * @property int $nr_registro
 *
 * @property TbEspecialidadeProfissional[] $tbEspecialidadeProfissionals
 */
class Profissional extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_profissional';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nm_profissional', 'tp_registro', 'nr_registro'], 'required'],
            [['nr_registro'], 'integer'],
            [['nm_profissional'], 'string', 'max' => 200],
            [['tp_registro'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_profissional' => 'Código do Profissional',
            'nm_profissional' => 'Nome do Profissional',
            'tp_registro' => 'Tipo de Registro',
            'nr_registro' => 'Número do Registro',
        ];
    }

    /**
     * Gets query for [[TbEspecialidadeProfissionals]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTbEspecialidadeProfissionals()
    {
        return $this->hasMany(TbEspecialidadeProfissional::className(), ['id_profissional' => 'id_profissional']);
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
                    ['label' => 'Aluno', 'url' => ['/aluno/create']],
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
