<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Avaliacao */

$this->title = $model->id_avaliacao;
$this->params['breadcrumbs'][] = ['label' => 'Avaliacaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="avaliacao-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_avaliacao], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_avaliacao], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_avaliacao',
            'id_cliente',
            'nm_cliente',
            'ds_ocupacao',
            'ds_motivo',
            'ds_medicamento',
            'ds_patologia',
            'ds_cirurgia',
            'fl_tabagista',
            'nr_cigarro',
            'nr_tempo_tabagismo',
            'nr_tempo_ex_tabagismo',
            'ds_comentario_tabagismo',
            'ds_doenca_respiratoria',
            'ds_comentario_doenca_respiratoria',
            'nr_filhos',
            'ds_ciclo_cesaria',
            'nr_nocturia',
            'ds_avaliacao_postural',
            'vr_p_a',
            'fl_relacao_dor',
            'fl_relacao_prazer',
            'fl_incontinencia',
            'ds_valor_braco_dir_esq',
            'ds_torax_abdomem',
            'ds_quadril_culote',
            'ds_coxa_dir_esq',
            'fl_endema',
            'fl_dor_circulatorio',
            'fl_peso',
            'ds_comentario_circulatorio',
            'fl_restricao',
            'ds_comentario_disgestivo',
            'nr_refeicoes_dia',
            'nr_litros_agua_dia',
            'ds_flexibilidade',
            'ds_imc',
            'ds_orientacoes',
        ],
    ]) ?>

</div>
