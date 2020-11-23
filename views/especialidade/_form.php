<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Especialidade */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="especialidade-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nm_especialidade')->textInput() ?>

    <?= $form->field($model, 'nr_tempo_duracao')->textInput() ?>

    <?= $form->field($model, 'id_especialidade_profissional')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
