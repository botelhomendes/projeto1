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
    echo $searchModel->getNavBar();
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
                    'view' => function ($url, $model) {
                        $url = '/index.php?r=relatorio/relatorioalunoindividual&id='.$model->id;
                        return Html::a('<span class="glyphicon glyphicon-book"></span>',  Url::to($url), 
                                
                                ['title' => Yii::t('app', 'Relatório'),
                                 'target' =>'_blank',                                    
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
