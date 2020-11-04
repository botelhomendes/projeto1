<?php
use yii\helpers\Html;
?>
<ul>
    <li><label>Você </label> <?= Html::encode($model->nm_cliente) ?></li>
    <li><label>Data de nascimento</label>: <?= Html::encode($model->dt_nascimento) ?></li>
    <li><label>Telefone</label>: <?= Html::encode($model->nr_telefone_1) ?></li>
</ul>