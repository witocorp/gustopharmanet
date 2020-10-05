<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "archivos".
 *
 * @property int $id
 * @property int $idCarpeta
 * @property string $nombre
 * @property string $url
 */
class Archivos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'archivos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idCarpeta', 'nombre', 'url'], 'required'],
            [['idCarpeta'], 'integer'],
            [['nombre', 'url'], 'string', 'max' => 1000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idCarpeta' => 'Id Carpeta',
            'nombre' => 'Nombre',
            'url' => 'Url',
        ];
    }
}
