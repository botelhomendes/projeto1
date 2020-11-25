<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Aluno */
/* @var $form ActiveForm */
?>
<div class="aluno-index">
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
                    ['label' => 'Professor', 'url' => ['/aluno/create']],
                    ['label' => 'Turma', 'url' => ['/aluno/create']],
                    ['label' => 'Avaliação', 'url' => ['/avaliacao/create']]
                ]
            ],
            ['label' => 'Relatórios', 'url' => ['/site/about'],
                'items' => [
                    ['label' => 'Aluno', 'url' => ['/aluno/create']],
                    ['label' => 'Professor', 'url' => ['/aluno/create']],
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
    ?>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //  ['class' => 'yii\grid\SerialColumn'],            
            'nm_aluno',
            'ds_cpf',
            ['class' => 'yii\grid\ActionColumn',
                'template' => '{view}{create}',
                'visible' => Yii::$app->user->isGuest ? false : true,
                'buttons' => [
                    'view' => function ($url) {
                        return Html::a('<span class="glyphicon glyphicon-book"></span>', Url::to($url), [
                                    'title' => Yii::t('app', 'Relatório'),
                        ]);
//return Html::a('<span class="glyphicon glyphicon-plus"></span>', $url, [
                        //	'title' => Yii::t('yii', 'Create'),
//				]);                                         
                    }
                ]
            ],
        ],
    ]);
    ?>
    <div class="form-group">
<?= Html::a('Cadastrar', ['/aluno/create'], ['class' => 'btn btn-primary']) ?>


    </div>

</div><!-- aluno-index -->
