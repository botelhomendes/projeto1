<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Turma */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="turma-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nm_turma')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ds_turno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nr_vagas')->textInput() ?>

    <?= $form->field($model, 'hr_inicio')->textInput() ?>

    <?= $form->field($model, 'hr_fim')->textInput() ?>

    <?= $form->field($model, 'dt_inicio')->textInput() ?>

    <?= $form->field($model, 'dt_fim')->textInput() ?>

    <?= $form->field($model, 'id_profissional')->textInput() ?>

    <?= $form->field($model, 'id_especialidade')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
