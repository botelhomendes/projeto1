<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\grid\GridView;
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
    
      <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_aluno',
            'nm_aluno',
            'dt_nascimento',
            //'ds_medicamento',
            //'ds_patologia',
            //'ds_cirurgia',
            //'fl_tabagista',
            //'nr_cigarro',
            //'nr_tempo_tabagismo',
            //'nr_tempo_ex_tabagismo',
            //'ds_comentario_tabagismo',
            //'ds_doenca_respiratoria',
            //'ds_comentario_doenca_respiratoria',
            //'nr_filhos',
            //'ds_ciclo_cesaria',
            //'nr_nocturia',
            //'ds_avaliacao_postural',
            //'vr_p_a',
            //'fl_relacao_dor',
            //'fl_relacao_prazer',
            //'fl_incontinencia',
            //'ds_valor_braco_dir_esq',
            //'ds_torax_abdomem',
            //'ds_quadril_culote',
            //'ds_coxa_dir_esq',
            //'fl_endema',
            //'fl_dor_circulatorio',
            //'fl_peso',
            //'ds_comentario_circulatorio',
            //'fl_restricao',
            //'ds_comentario_disgestivo',
            //'nr_refeicoes_dia',
            //'nr_litros_agua_dia',
            //'ds_flexibilidade',
            //'ds_imc',
            //'ds_orientacoes',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
     <div class="form-group">
         <?= Html::a('Cadastrar', ['/aluno/create'], ['class'=>'btn btn-primary']) ?>
        
        
    </div>

</div><!-- aluno-index -->
