<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Profissional */

$this->title = 'Alterar Profissional';
$this->params['breadcrumbs'][] = ['label' => 'Profissional', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profissional-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
