<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "productos".
 *
 * @property int $id
 * @property int $idMarca
 * @property string $producto
 * @property string $url
 */
class Productos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
	public $file, $fileup;
	
    public static function tableName()
    {
        return 'productos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idMarca', 'producto', 'url','file'], 'required'],
            [['idMarca'], 'integer'],
			[['file', 'fileup'], 'file'],
            [['producto'], 'string', 'max' => 500],
            [['url'], 'string', 'max' => 1000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idMarca' => 'Id Marca',
            'producto' => 'Producto',
            'url' => 'Url',
        ];
    }
}
