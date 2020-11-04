<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Avaliacao */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="avaliacao-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_cliente')->textInput() ?>

    <?= $form->field($model, 'nm_cliente')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ds_ocupacao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ds_motivo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ds_medicamento')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ds_patologia')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ds_cirurgia')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fl_tabagista')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nr_cigarro')->textInput() ?>

    <?= $form->field($model, 'nr_tempo_tabagismo')->textInput() ?>

    <?= $form->field($model, 'nr_tempo_ex_tabagismo')->textInput() ?>

    <?= $form->field($model, 'ds_comentario_tabagismo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ds_doenca_respiratoria')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ds_comentario_doenca_respiratoria')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nr_filhos')->textInput() ?>

    <?= $form->field($model, 'ds_ciclo_cesaria')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nr_nocturia')->textInput() ?>

    <?= $form->field($model, 'ds_avaliacao_postural')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vr_p_a')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fl_relacao_dor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fl_relacao_prazer')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fl_incontinencia')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ds_valor_braco_dir_esq')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ds_torax_abdomem')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ds_quadril_culote')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ds_coxa_dir_esq')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fl_endema')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fl_dor_circulatorio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fl_peso')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ds_comentario_circulatorio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fl_restricao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ds_comentario_disgestivo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nr_refeicoes_dia')->textInput() ?>

    <?= $form->field($model, 'nr_litros_agua_dia')->textInput() ?>

    <?= $form->field($model, 'ds_flexibilidade')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ds_imc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ds_orientacoes')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
