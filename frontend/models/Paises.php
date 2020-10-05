<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "paises".
 *
 * @property int $id
 * @property string $pais
 * @property string $bandera
 */
class Paises extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'paises';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pais', 'bandera'], 'required'],
            [['pais'], 'string', 'max' => 200],
            [['bandera'], 'string', 'max' => 500],
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
            'bandera' => 'Bandera',
        ];
    }
}
