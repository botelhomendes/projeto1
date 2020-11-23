<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Especialidade */

$this->title = 'Update Especialidade: ' . $model->id_especialidade;
$this->params['breadcrumbs'][] = ['label' => 'Especialidades', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_especialidade, 'url' => ['view', 'id' => $model->id_especialidade]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="especialidade-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
