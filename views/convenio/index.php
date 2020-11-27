<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ConvenioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pesquisar Convênio';
?>
<div class="convenio-index">

    <h1><?= Html::encode($this->title) ?></h1>



    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id_convenio',
            'ds_nome',
            'nr_registro_ans',
         //   'cd_operadora',
         //   'vs_tiss',
        //    'tb_preco',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
    <div class="form-group">
        <?= Html::a('Cadastrar', ['/convenio/create'], ['class' => 'btn btn-primary']) ?>


    </div>

</div>
