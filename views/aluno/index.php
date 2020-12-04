<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Aluno */
/* @var $form ActiveForm */
$this->title = 'Pesquisar Aluno';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aluno-index">
 
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //  ['class' => 'yii\grid\SerialColumn'],            
            'nm_aluno',
            'ds_cpf',
            ['class' => 'yii\grid\ActionColumn',
                'template' => '{view}{create}',
              //  'visible' => Yii::$app->user->isGuest ? false : true,
            ],
        ],        
    ]);
    ?>
    <div class="form-group">
<?= Html::a('Cadastrar', ['/aluno/create'], ['class' => 'btn btn-success']) ?>


    </div>

</div><!-- aluno-index -->
