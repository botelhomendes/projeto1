<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\grid\GridView;;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProfissionalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $model app\models\Profissional */
$this->title = 'Pesquisar Profissional';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="aluno-index">


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
           

       //     'id_profissional',
            'nm_profissional',
            'tp_registro',
            'nr_registro',

            ['class' => 'yii\grid\ActionColumn',
                'template' => '{view}{create}',
              //  'visible' => Yii::$app->user->isGuest ? false : true,
            ],
        ],
    ]); ?>
    <div class="form-group">
<?= Html::a('Cadastrar', ['/profissional/create'], ['class' => 'btn btn-primary']) ?>


    </div>


</div>
<?= Html::a('Cadastrar', ['create'], ['class' => 'btn btn-success']) ?>