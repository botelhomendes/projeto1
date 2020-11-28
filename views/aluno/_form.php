<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Aluno */
/* @var $form yii\widgets\ActiveForm */

?>
<?php 
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
            <?= $form->field($model, 'nm_aluno')->textInput(['maxlength' => true, 'style' => 'width:500px']) ?>
        </div>
        <div class="col-md-3">
            
            <?= $form->field($model, 'dt_nascimento', [ 'options' => ['style' => 'width: 250px']])->widget(\kartik\date\DatePicker::className(), ['pluginOptions' => [  'format' => 'dd/mm/yyyy' ], 'language' => 'pt-BR'])
                    
                    //['pluginOptions' => [  'format' => 'dd/mm/yyyy',]])
            
            ?>
        </div>

<div class="col-md-3">
            <?= Html::textInput(['maxlength' => true, 'style' => 'width:200px']) ?>
        </div>        

    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'ds_cpf')->textInput(['maxlength' => true, 'style' => 'width:200px']) ?>
        </div>
        <div class="col-md-6">

            <?php $accountStatus = array('M' => 'Masculino', 'F' => 'Feminino') ?>
            <?= $form->field($model, 'ds_sexo')->radioList($accountStatus) ?>	
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'ds_identidade')->textInput(['maxlength' => true, 'style' => 'width:200px']) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'ds_responsaveis')->textInput(['maxlength' => true, 'style' => 'width:300px']) ?>
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

            <?= $form->field($model, 'ds_cep')->textInput(['maxlength' => true, 'style' => 'width:200px']) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'ds_endereco')->textInput(['maxlength' => true, 'style' => 'width:300px']) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'ds_email')->textInput(['maxlength' => true, 'style' => 'width:300px']) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'ds_profissao')->textInput(['maxlength' => true, 'style' => 'width:300px']) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'ds_telefone1')->textInput(['style' => 'width:300px']) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'ds_telefone2')->textInput(['style' => 'width:300px']) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'ds_whatsapp')->textInput(['style' => 'width:300px']) ?>
        </div>
    </div>
   <div class="row">
        <div class="col-md-6">
            <?php $items = $model->getDataListConvenio();?>
            <?= $form->field($model, 'id_convenio')->dropDownList($items, ['style' => 'width:300px']) ?>               
         
        </div>
       <div class="col-md-2">
            <?= $form->field($model, 'nr_matricula_conv')->textInput(['style' => 'width:150px']) ?>
        </div>
       
       <div class="col-md-3">
            <?= $form->field($model, 'dt_validade')->textInput(['style' => 'width:100px']) ?>
        </div>
   </div>
    
     <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'ds_observacao')->textarea(['style' => 'width:400px']) ?>
        </div>
       <div class="col-md-6">
            <?= $form->field($model, 'im_foto')->fileInput() ?>
        </div>
              
   </div>
  
<div class="row">
        <div class="col-md-2">           
            <?= $form->field($model, 'fl_paciente')->checkbox(['value' => 'S', 
                'id' => 'paciente'])                                                  
                    ?>
        </div>
       
        <div class="col-md-2">     
             <?php $items = $model->getDataListProfissional();?>
            <?= $form->field($model, 'id_profissional')->dropDownList($items, ['id' => 'profissional', 'style' => 'width:300px']) ?>               
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
