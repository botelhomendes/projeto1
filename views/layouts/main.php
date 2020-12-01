<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
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
                    ['label' => 'Aluno/Paciente', 'url' => ['/aluno/index']],
                    ['label' => 'Profissional', 'url' => ['/profissional/create']],
                    ['label' => 'Especialidade', 'url' => ['/especialidade/index']],
                    ['label' => 'Turma', 'url' => ['/turma/index']],
                    ['label' => 'TurmaXAluno', 'url' => ['/turmaaluno/index']],
                    ['label' => 'Avaliação', 'url' => ['/avaliacao/index']]
                ]
            ],
            ['label' => 'Relatórios', 'url' => ['/site/about'],
                'items' => [
                    ['label' => 'Aluno/Paciente', 'url' => ['/aluno/listaalunosrelatorio']],
                    ['label' => 'Profissional', 'url' => ['/aluno/create']],
                    ['label' => 'Turma', 'url' => ['/aluno/create']],
                    ['label' => 'Avaliação', 'url' => ['/relatorio/relatorioalunoavaliacao']],
                     ['label' => 'Graficos', 'url' => ['/grafico/grafico1']]
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

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Versão 0.01 <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
