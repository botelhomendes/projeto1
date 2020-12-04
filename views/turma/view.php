<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Turma */

$this->title = $model->nm_turma;
$this->params['breadcrumbs'][] = ['label' => 'Turmas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="turma-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_turma], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_turma], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'template' => "<tr><th  style='width:250px'>{label}</th><td>{value}</td></tr>",
        'attributes' => [
            'id_turma',
            'nm_turma',
            'ds_turno',
            'nr_vagas',
            'hr_inicio',
            'hr_fim',
            'dt_inicio',
            'dt_fim',
            'id_profissional',
            'id_especialidade',
        ],
    ]) ?>

</div>
