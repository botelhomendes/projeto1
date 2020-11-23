<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Profissional */
/* @var $searchModel app\models\ProfissionalSearch */

$this->title = 'Cadastrar Profissional';
$this->params['breadcrumbs'][] = ['label' => 'Profissionais', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profissional-create">
<?php
    echo $model->getNavBar();
    ?>
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
