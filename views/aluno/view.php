<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Aluno */

$this->title = $model->nm_aluno;
$this->params['breadcrumbs'][] = ['label' => 'Alunos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="aluno-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Alterar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

  
    
    <div class="col-sm-6 col-md-6 col-lg-6" >

    <?= DetailView::widget([
       'model' => $model,
        //verificar template valores para diminiur coluna
        'template' => "<tr><th  style='width:250px'>{label}</th><td>{value}</td></tr>",
         //'contentOptions' => ['style' => 'width:10px;'], 
        
        'attributes' => [            
            'id',
            'nm_aluno',
            'ds_cpf',           
            'ds_sexo',
            'ds_identidade',
            'ds_cep',
            'ds_estado',
            'ds_telefone1',
            'ds_telefone2',
            'ds_observacao',
            'id_convenio',
             [                
              'attribute'=>'fl_paciente',              
              'value' => function($model, $index){
                if($model->fl_paciente == '0'){
                  return 'Não';
                }else{
                    return 'Sim';
                }
              },
                    
            ],   
           
 ],
       
    ]) ?>
        
        
   </div>
    <div class="col-sm-6 col-md-6 col-lg-6" >

    <?= DetailView::widget([
         'model' => $model,
        //verificar template valores para diminiur coluna
        'template' => "<tr><th  style='width:250px'>{label}</th><td>{value}</td></tr>",
         //'contentOptions' => ['style' => 'width:10px;'], 
         'attributes' => [
             [                
              'attribute'=>'Foto',
              'format' => ['image',['width'=>'100','height'=>'100']],
              'value' => function($model, $index){
                if($model->filename == null){
                  return 'Sem foto';
                }else{
                    return Yii::getAlias('@web').'\\images\\'.$model->filename;
                }
              },
                    
            ],           
            'dt_nascimento',
            'ds_responsaveis',            
            'ds_cidade',
            'ds_endereco',            
            'ds_email:email',
            'ds_profissao',            
            'ds_whatsapp',
            'nr_matricula_conv',
            'dt_validade',
             
             ]
             ]);


    ?>
   </div>
    
</div>
