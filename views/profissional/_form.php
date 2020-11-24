<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Profissional */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="profissional-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nm_profissional')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tp_registro')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nr_registro')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
