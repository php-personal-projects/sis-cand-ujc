<?php

namespace backend\models;

use common\models\User;
use Yii;

/**
 * This is the model class for table "curso".
 *
 * @property int $id
 * @property string $nome
 * @property string $duracao
 * @property int $numero_vagas
 * @property string $regime
 * @property string|null $descricao
 * @property string|null $plano_curso
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int|null $created_by
 *
 * @property User $createdBy
 */
class Curso extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'curso';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'duracao', 'numero_vagas', 'regime'], 'required'],
            [['numero_vagas', 'created_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['nome'], 'string', 'max' => 60],
            [['duracao'], 'string', 'max' => 10],
            [['regime'], 'string', 'max' => 55],
            [['descricao', 'plano_curso'], 'string', 'max' => 255],
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
            'duracao' => 'Duracao',
            'numero_vagas' => 'Numero Vagas',
            'regime' => 'Regime',
            'descricao' => 'Descricao',
            'plano_curso' => 'Plano Curso',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
        ];
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery|UserQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::class, ['id' => 'created_by']);
    }

    /**
     * {@inheritdoc}
     * @return CursoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CursoQuery(get_called_class());
    }
}
