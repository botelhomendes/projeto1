<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\grid\GridView;

/* @var $this yii\web\View */

$this->title = 'Harmonia Faz Bem';
?>
<?php

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
                    ['label' => 'Avaliação', 'url' => ['/avaliacao/create']],
                    ['label' => 'Convênio', 'url' => ['/convenio/create']]
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
    