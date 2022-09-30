<?php

namespace backend\models;

use common\models\User;
use Yii;

/**
 * This is the model class for table "disciplina".
 *
 * @property int $id
 * @property string|null $nome
 * @property float $preco
 * @property int $curso_id
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int|null $created_by
 *
 * @property User $createdBy
 * @property Curso $curso
 */
class Disciplina extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'disciplina';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['preco', 'curso_id'], 'required'],
            [['preco'], 'number'],
            [['curso_id', 'created_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['nome'], 'string', 'max' => 255],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
            [['curso_id'], 'exist', 'skipOnError' => true, 'targetClass' => Curso::class, 'targetAttribute' => ['curso_id' => 'id']],
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
            'preco' => 'Preco',
            'curso_id' => 'Curso',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
        ];
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

    /**
     * Gets query for [[Curso]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCurso()
    {
        return $this->hasOne(Curso::class, ['id' => 'curso_id']);
    }

    /**
     * Gets query for [[CursoDisciplinas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCursoDisciplinas($cursoId)
    {
        return $this->hasMany(Curso::class, ['disciplina_id' => $cursoId]);
    }

	/**
	 * This method gets the total price of the application based on the course selected
	 * @param $cursoId
	 * @return bool|int|mixed|string|null
	 */
	public function getSubjectPrices($cursoId){

		return Disciplina::find()->from('disciplina')
			->join('INNER JOIN', 'curso','disciplina.curso_id = curso.id')
			->where(['curso.id' => $cursoId])->sum('disciplina.preco');
	}
}
