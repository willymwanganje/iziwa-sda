<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

class MatukioSearch extends Matukio
{
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['jina', 'maelezo'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Matukio::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize' => 10],
            'sort' => ['defaultOrder' => ['tarehe_ya_kuanza' => SORT_DESC]],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        // Backup query to restore later if needed
        $originalQuery = clone $query;

        if (!empty($this->jina)) {
            $query->andFilterWhere(['ilike', 'jina', $this->jina]);
        }

        if (!empty($this->maelezo)) {
            $query->andFilterWhere(['ilike', 'maelezo', $this->maelezo]);
        }

        // Check if query returned anything
        if ($query->count() === 0) {
            // Reset query if no results found
            $query = $originalQuery;
            $dataProvider->query = $query;
        }

        return $dataProvider;
    }
}
