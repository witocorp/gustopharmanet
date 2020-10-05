<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "marcas".
 *
 * @property int $id
 * @property int $pais
 * @property string $marca
 * @property string $url
 */
class Marcas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
	public $file, $fileup;
	
    public static function tableName()
    {
        return 'marcas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pais', 'marca', 'url','file'], 'required'],
            [['pais'], 'integer'],
			[['file'], 'file'],
            [['fileup'], 'file'],
            [['marca'], 'string', 'max' => 500],
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
            'pais' => 'Pais',
            'marca' => 'Marca',
            'url' => 'Url',
        ];
    }
}
