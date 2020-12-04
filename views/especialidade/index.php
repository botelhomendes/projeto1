<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EspecialidadeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pesquisar Especialidades';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="especialidade-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_especialidade',
            'nm_especialidade',
            'nr_tempo_duracao',            

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
<?= Html::a('Cadastrar', ['create'], ['class' => 'btn btn-success']) ?>

