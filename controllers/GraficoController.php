<?php
namespace app\controllers;
use bsadnu\googlecharts\ColumnChart;
use yii\web\Controller;
use Yii;

class GraficoController extends Controller {

    public $model;

    
    public function actionGrafico1() {
               return $this->render('grafico1'); 
}

}/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

