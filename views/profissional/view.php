<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Profissional */

$this->title  = 'Visualizar Profissional';;
$this->params['breadcrumbs'][] = ['label' => 'Profissional', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

\yii\web\YiiAsset::register($this);
?>
<div class="profissional-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_profissional',
            'nm_profissional',
            'tp_registro',
            'nr_registro',
        ],
    ]) ?>
    
        <p>
        <?= Html::a('Alterar', ['update', 'id' => $model->id_profissional], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Excluir', ['delete', 'id' => $model->id_profissional], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Deseja Excluir o Registro?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

</div>
