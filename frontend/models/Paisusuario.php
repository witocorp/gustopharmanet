<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "paisusuario".
 *
 * @property int $id
 * @property int $pais
 * @property int $usuario
 */
class Paisusuario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'paisusuario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pais', 'usuario'], 'required'],
            [['pais', 'usuario'], 'integer'],
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
            'usuario' => 'Usuario',
        ];
    }
}
