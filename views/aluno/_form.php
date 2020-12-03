<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\file\FileInput;
use yii\helpers\Url;
    
  
/* @var $this yii\web\View */

/* @var $model app\models\Aluno */
/* @var $form yii\widgets\ActiveForm */
?>
<?php
$exibe = false;
$script = <<< JS
$(function() {       
        $('#profissional').hide();
       
        
      
        
})
        
        
$('#paciente').change(function() {
   
    var ccexists = $("#paciente").prop("checked") ? true : false;
    if (ccexists == true) {
         
        $('#profissional').show();
         
      
    } else {
       
        $('#profissional').hide();
    };
});

JS;
$this->registerJs($script);
?>

<div class="aluno-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'nm_aluno')->textInput(['maxlength' => true, 'style' => 'width:550px']) ?>
        </div>

        <div class="col-md-6">

            <?= $form->field($model, 'dt_nascimento', ['options' => ['style' => 'width: 250px']])->widget(\kartik\date\DatePicker::className(), ['pluginOptions' => ['format' => 'dd/mm/yyyy'], 'language' => 'pt-BR']) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
              <?= $form->field($model, 'ds_cpf', ['options' => ['style' => 'width: 150px']])->widget(\yii\widgets\MaskedInput::className(),['mask' => '99999999999']) ?>
        </div>
        <div class="col-md-6">

            <?php $accountStatus = array('Masculino' => 'Masculino', 'Feminino' => 'Feminino') ?>
            <?= $form->field($model, 'ds_sexo')->radioList($accountStatus) ?>	
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'ds_identidade')->textInput(['maxlength' => true, 'style' => 'width:200px']) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'ds_responsaveis')->textInput(['maxlength' => true, 'style' => 'width:400px']) ?>
        </div>        
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'ds_cidade')->textInput(['maxlength' => true, 'style' => 'width:300px']) ?>               
        </div>
        <div class="col-md-1">
            <?= $form->field($model, 'ds_estado')->dropDownList($model->getEstados(), ['style' => 'width:80px']) ?>
        </div>
        <div class="col-md-5">       
            <?= $form->field($model, 'ds_cep', ['options' => ['style' => 'width: 150px']])->widget(\yii\widgets\MaskedInput::className(),['mask' => '99999-999']) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'ds_endereco')->textInput(['maxlength' => true, 'style' => 'width:300px']) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'ds_email')->textInput(['maxlength' => true, 'style' => 'width:350px']) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'ds_profissao')->textInput(['maxlength' => true, 'style' => 'width:400px']) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'ds_telefone1', ['options' => ['style' => 'width: 250px']])->widget(\yii\widgets\MaskedInput::className(),['mask' => '(99)9999-9999']) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
           <?= $form->field($model, 'ds_telefone2', ['options' => ['style' => 'width: 250px']])->widget(\yii\widgets\MaskedInput::className(),['mask' => '(99)99999-9999']) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'ds_whatsapp', ['options' => ['style' => 'width: 250px']])->widget(\yii\widgets\MaskedInput::className(),['mask' => '(99)99999-9999']) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?php $items = $model->getDataListConvenio(); ?>
            <?= $form->field($model, 'id_convenio')->dropDownList($items, ['style' => 'width:300px']) ?>               

        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'nr_matricula_conv')->textInput(['style' => 'width:150px']) ?>
        </div>

        <div class="col-md-3">
               <?= $form->field($model, 'dt_validade', ['options' => ['style' => 'width: 250px']])->widget(\kartik\date\DatePicker::className(), ['pluginOptions' => ['format' => 'dd/mm/yyyy'], 'language' => 'pt-BR']) ?>
          
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'ds_observacao')->textarea(['style' => 'width:400px']) ?>
        </div>
        <div class="col-md-2">           
            <?=
            $form->field($model, 'fl_paciente')->checkbox(['value' => '1',
                'id' => 'paciente'])
            ?>
        </div>

        <div class="col-md-2">     
            <?php $items = $model->getDataListProfissional();  ?>
            <?= $form->field($model, 'id_profissional')->dropDownList($items, ['id' => 'profissional', 'style' => 'width:300px']) ?>               
        </div>

    </div>

    <div class="row">

         <div class="col-md-6">
             <?= $form->field($model, 'image')->widget(\kartik\file\FileInput::className(), 
                       ['pluginOptions'=>['allowedFileExtensions'=>['jpg','gif','png']]]);
                    
                    ?>
        </div>
          
    </div>

    <div class="row"> 
        
         <div class="col-md-3">
            <div class="form-group">                                
                <?= Html::submitButton('Salvar', ['class' => 'btn btn-success']) ?>
            </div>
        </div> 
       
     
    </div>
    <?php ActiveForm::end(); ?>


</div>
