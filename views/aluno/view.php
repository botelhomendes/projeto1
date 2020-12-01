<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

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

    <?= DetailView::widget([
        'model' => $model,
        //verificar template valores para diminiur coluna
        'template' => "<tr><th  style='width:250px'>{label}</th><td>{value}</td></tr>",
         //'contentOptions' => ['style' => 'width:10px;'], 
        
        'attributes' => [
            'id',
            'nm_aluno',
            'ds_cpf',
            'dt_nascimento',
            'ds_sexo',
            'ds_identidade',
            'ds_responsaveis',
            'ds_estado',
            'ds_cidade',
            'ds_endereco',
            'ds_cep',
            'ds_email:email',
            'ds_profissao',
            'ds_telefone1',
            'ds_telefone2',
            'ds_whatsapp',
            'id_convenio',
           
        ],
            [
                'attribute'=>'images',
                'value'=> Yii::$app->homeUrl.'uploads/'.$model->images,
                'format' => ['image',['width'=>'100','height'=>'100']],
            ],
         
    ]) ?>

</div>
