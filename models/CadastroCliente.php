<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_cadastro_cliente".
 *
 * @property int $id_cliente
 * @property string|null $nm_cliente
 * @property string|null $dt_nascimento
 * @property int|null $nr_telefone_1
 */
class CadastroCliente extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_cadastro_cliente';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dt_nascimento'], 'safe'],
            [['nr_telefone_1'], 'integer'],
            [['nm_cliente'], 'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_cliente' => 'Codigo do Cliente',
            'nm_cliente' => 'Nome do Cliente',
            'dt_nascimento' => 'Data de Nascimento',
            'nr_telefone_1' => 'Número Telefone',
        ];
    }
}
