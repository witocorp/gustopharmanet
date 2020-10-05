<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "carpetas".
 *
 * @property int $id
 * @property int $idProducto
 * @property string $nombre
 */
class Carpetas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'carpetas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idProducto', 'nombre'], 'required'],
            [['idProducto'], 'integer'],
            [['nombre'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idProducto' => 'Id Producto',
            'nombre' => 'Nombre',
        ];
    }
}
