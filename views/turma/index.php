<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TurmaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pesquisar Turma';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="turma-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
           

            'id_turma',
            'nm_turma',
            'ds_turno',
           // 'nr_vagas',
           // 'hr_inicio',
            //'hr_fim',
            //'dt_inicio',
            //'dt_fim',
            //'id_profissional',
            //'id_especialidade',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <div class="form-group">
         <?= Html::a('Cadastrar', ['/turma/create'], ['class'=>'btn btn-success']) ?>
        
        
    </div>


</div>
