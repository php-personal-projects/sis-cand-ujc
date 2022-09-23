<?php

namespace frontend\models;

use backend\models\Curso;
use backend\models\Disciplina;
use common\models\User;
use Yii;

/**
 * This is the model class for table "candidatura".
 *
 * @property int $id
 * @property int $candidato_id
 * @property int $curso_id
 * @property string $regime
 * @property string $estado
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int|null $created_by
 *
 * @property Candidato $candidato
 * @property User $createdBy
 * @property Curso $curso
 */
class Candidatura extends \yii\db\ActiveRecord
{

	const ESTADO_COMPLETO = 'Completa';
	const ESTADO_INCOMPLETO = 'Incompleta';
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'candidatura';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['candidato_id', 'curso_id', 'regime', 'estado'], 'required'],
            [['candidato_id', 'curso_id', 'created_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['regime'], 'string', 'max' => 20],
            [['estado'], 'string', 'max' => 100],
            [['candidato_id'], 'exist', 'skipOnError' => true, 'targetClass' => Candidato::class, 'targetAttribute' => ['candidato_id' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
            [['curso_id'], 'exist', 'skipOnError' => true, 'targetClass' => Curso::class, 'targetAttribute' => ['curso_id' => 'id']],
			['estado', 'default', 'value' => self::ESTADO_INCOMPLETO],
			['estado', 'in', 'range' => [self::ESTADO_COMPLETO, self::ESTADO_INCOMPLETO]],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'candidato_id' => 'Candidato ID',
            'curso_id' => 'Curso',
            'regime' => 'Regime',
            'estado' => 'Estado',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
        ];
    }

    /**
     * Gets query for [[Candidato]].
     *
     * @return \yii\db\ActiveQuery|
     */
    public function getCandidato()
    {
        return $this->hasOne(Candidato::class, ['id' => 'candidato_id']);
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery|
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::class, ['id' => 'created_by']);
    }

    /**
     * Gets query for [[Curso]].
     *
     * @return \yii\db\ActiveQuery|
     */
    public function getCurso()
    {
        return $this->hasOne(Curso::class, ['id' => 'curso_id']);
    }


}
