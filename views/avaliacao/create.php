<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

/* @var $this yii\web\View */
/* @var $model app\models\Avaliacao */

$this->title = 'Realizar avaliação';
$this->params['breadcrumbs'][] = ['label' => 'Avaliacaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="avaliacao-create">
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
                   'items' =>[ 
                       ['label' => 'Aluno' , 'url' =>['/aluno/create']],
                       ['label' => 'Professor' , 'url' =>['/aluno/create']],
                       ['label' => 'Turma' , 'url' =>['/aluno/create']],
                       ['label' => 'Avaliação' , 'url' =>['/avaliacao/create']]
                       ]
                    ],
                ['label' => 'Relatórios', 'url' => ['/site/about'],
                    'items' =>[ 
                       ['label' => 'Aluno' , 'url' =>['/aluno/create']],
                       ['label' => 'Professor' , 'url' =>['/aluno/create']],
                       ['label' => 'Turma' , 'url' =>['/aluno/create']]
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
        ?>
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
