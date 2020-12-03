<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Profissional */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="profissional-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-6">
             <?= $form->field($model, 'nm_profissional')->textInput(['maxlength' => true, 'style' => 'width:550px']) ?>
        </div>
        <div class="col-md-6">           
            <?php $accountStatus1 = array() ?>
            <?= $form->field($model, 'tp_registro')->dropDownList($model->getTipoRegistro(),[ 'style' => 'width:400px']) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
             <?= $form->field($model, 'nr_registro')->textInput(['maxlength' => true, 'style' => 'width:300px']) ?>
        </div>
    </div>
   

    

   

    <div class="form-group">
        <?= Html::submitButton('Salvar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
