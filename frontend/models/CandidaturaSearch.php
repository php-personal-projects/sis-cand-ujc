<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Candidatura;

/**
 * CandidaturaSearch represents the model behind the search form of `frontend\models\Candidatura`.
 */
class CandidaturaSearch extends Candidatura
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'candidato_id', 'curso_id', 'created_by'], 'integer'],
            [['regime', 'estado', 'created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Candidatura::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['id' => SORT_DESC]]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'candidato_id' => $this->candidato_id,
            'curso_id' => $this->curso_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
        ]);

        $query->andFilterWhere(['like', 'regime', $this->regime])
            ->andFilterWhere(['like', 'estado', $this->estado]);

        return $dataProvider;
    }
}
