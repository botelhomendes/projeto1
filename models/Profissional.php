<?php

namespace app\models;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\grid\GridView;

use Yii;

/**
 * This is the model class for table "tb_profissional".
 *
 * @property int $id_profissional
 * @property string $nm_profissional
 * @property string $tp_registro
 * @property int $nr_registro
 *
 * @property TbEspecialidadeProfissional[] $tbEspecialidadeProfissionals
 */
class Profissional extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_profissional';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nm_profissional', 'tp_registro', 'nr_registro'], 'required'],
            [['nr_registro'], 'integer'],
            [['nm_profissional'], 'string', 'max' => 200],
            [['tp_registro'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_profissional' => 'Código do Profissional',
            'nm_profissional' => 'Nome do Profissional',
            'tp_registro' => 'Tipo de Registro',
            'nr_registro' => 'Número do Registro',
        ];
    }
    
    public function getTipoRegistro(){
        return $estados =  ['CR' => 'CREF', 
                            'CO' => 'CONFEF'];
    }

    /**
     * Gets query for [[TbEspecialidadeProfissionals]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTbEspecialidadeProfissionals()
    {
        return $this->hasMany(TbEspecialidadeProfissional::className(), ['id_profissional' => 'id_profissional']);
    }
    
   
}
