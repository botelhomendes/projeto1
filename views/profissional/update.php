<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Profissional */

$this->title = 'Update Profissional: ' . $model->id_profissional;
$this->params['breadcrumbs'][] = ['label' => 'Profissionals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_profissional, 'url' => ['view', 'id' => $model->id_profissional]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="profissional-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
