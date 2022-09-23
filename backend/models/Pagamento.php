<?php

namespace backend\models;

use common\models\User;
use Yii;

/**
 * This is the model class for table "pagamento".
 *
 * @property int $id
 * @property string|null $modo_pagamento
 * @property int $contacto
 * @property float $valor
 * @property string $data
 * @property int $candidato_id
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int|null $created_by
 *
 * @property Candidato $candidato
 * @property User $createdBy
 */
class Pagamento extends \yii\db\ActiveRecord
{
	const MPESA = 'M-pesa';
	const EMOLA = 'E-Mola';
	const MKESH = 'mKesh';
	const DEPOSITO = 'Deposito';
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pagamento';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['contacto', 'valor', 'data', 'candidato_id'], 'required'],
            [['contacto', 'candidato_id', 'created_by'], 'integer'],
            [['valor'], 'number'],
            [['data', 'created_at', 'updated_at'], 'safe'],
            [['modo_pagamento'], 'string', 'max' => 255],
            [['candidato_id'], 'exist', 'skipOnError' => true, 'targetClass' => Candidato::class, 'targetAttribute' => ['candidato_id' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'modo_pagamento' => 'Modo Pagamento',
            'contacto' => 'Contacto',
            'valor' => 'Valor',
            'data' => 'Data',
            'candidato_id' => 'Candidato ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
        ];
    }

    /**
     * Gets query for [[Candidato]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCandidato()
    {
        return $this->hasOne(Candidato::class, ['id' => 'candidato_id']);
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::class, ['id' => 'created_by']);
    }

}
