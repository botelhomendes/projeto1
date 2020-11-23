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
            <?= $form->field($model, 'nm_profissional')->textInput(['maxlength' => true, 'style' => 'width:500px']) ?>            
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
<?php  $items = ['teste1' => 'CREFITO', 'teste2' => 'CRM']; ?>
            <?= $form->field($model, 'tp_registro')->dropDownList($items, ['style' => 'width:150px'])?> 
        </div>
        <div class="col-md-3">
<?= $form->field($model, 'nr_registro')->textInput(['style' => 'width:100px']) ?>         
        </div>

    </div>






    <div class="form-group">
<?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

<?php ActiveForm::end(); ?>

</div>
