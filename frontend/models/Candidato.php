<?php

namespace frontend\models;

use common\models\User;
use Yii;

/**
 * This is the model class for table "candidato".
 *
 * @property int $id
 * @property string|null $nome
 * @property string $sexo
 * @property string $tipo_documento
 * @property string $numero_documento
 * @property int $nuit
 * @property string $data_nascimento
 * @property string $naturalidade
 * @property string $provincia
 * @property int $contacto_actual
 * @property string $nivel_academico
 * @property string $nome_escola
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int|null $created_by
 *
 * @property Candidatura[] $candidaturas
 */
class Candidato extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'candidato';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sexo', 'tipo_documento', 'numero_documento', 'nuit', 'data_nascimento', 'naturalidade', 'provincia', 'contacto_actual', 'nivel_academico', 'nome_escola'], 'required'],
            [['nuit', 'contacto_actual', 'created_by'], 'integer'],
            [['data_nascimento', 'created_at', 'updated_at'], 'safe'],
            [['nome', 'naturalidade', 'provincia', 'nivel_academico', 'nome_escola'], 'string', 'max' => 255],
            [['sexo'], 'string', 'max' => 15],
            [['tipo_documento', 'numero_documento'], 'string', 'max' => 50],
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
            'nome' => 'Nome',
            'sexo' => 'Sexo',
            'tipo_documento' => 'Tipo Documento',
            'numero_documento' => 'Numero Documento',
            'nuit' => 'Nuit',
            'data_nascimento' => 'Data Nascimento',
            'naturalidade' => 'Naturalidade',
            'provincia' => 'Provincia',
            'contacto_actual' => 'Contacto Actual',
            'nivel_academico' => 'Nivel Academico',
            'nome_escola' => 'Nome Escola',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
        ];
    }

    /**
     * Gets query for [[Candidaturas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCandidaturas()
    {
        return $this->hasMany(Candidatura::class, ['candidato_id' => 'id']);
    }

//    /**
//     * Gets query for [[CreatedBy]].
//     *
//     * @return \yii\db\ActiveQuery|UserQuery
//     */
//    public function getCreatedBy()
//    {
//        return $this->hasOne(User::class, ['id' => 'created_by']);
//    }
//
//    /**
//     * {@inheritdoc}
//     * @return CandidatoQuery the active query used by this AR class.
//     */
//    public static function find()
//    {
//        return new CandidatoQuery(get_called_class());
//    }
}
