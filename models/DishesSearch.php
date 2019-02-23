<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Dishes;
use app\models\Ingredients;

/**
 * DishesSearch represents the model behind the search form of `app\models\Dishes`.
 */
class DishesSearch extends Dishes
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'ingredient1', 'ingredient2', 'ingredient3', 'ingredient4', 'ingredient5'], 'integer'],
            [['dish', 'ingredient1_name', 'ingredient2_name', 'ingredient3_name', 'ingredient4_name', 'ingredient5_name'], 'safe'],
            
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Dishes::find()
            ->innerJoinWith(['ingredient10', 'ingredient20', 'ingredient30', 'ingredient40', 'ingredient50'])
            ->where(['ingredient10.visibility' => 1,
                     'ingredient20.visibility' => 1,
                     'ingredient30.visibility' => 1,
                     'ingredient40.visibility' => 1,
                     'ingredient50.visibility' => 1,
                    ]);
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $dataProvider->sort->attributes['ingredient1_name'] = [
    'asc' => ['ingredient10.ingredient' => SORT_ASC],
    'desc' => ['ingredient10.ingredient' => SORT_DESC],
];
        $dataProvider->sort->attributes['ingredient2_name'] = [
    'asc' => ['ingredient20.ingredient' => SORT_ASC],
    'desc' => ['ingredient20.ingredient' => SORT_DESC],
];
        $dataProvider->sort->attributes['ingredient3_name'] = [
    'asc' => ['ingredient30.ingredient' => SORT_ASC],
    'desc' => ['ingredient30.ingredient' => SORT_DESC],
];
        $dataProvider->sort->attributes['ingredient4_name'] = [
    'asc' => ['ingredient40.ingredient' => SORT_ASC],
    'desc' => ['ingredient40.ingredient' => SORT_DESC],
];
        $dataProvider->sort->attributes['ingredient5_name'] = [
    'asc' => ['ingredient50.ingredient' => SORT_ASC],
    'desc' => ['ingredient50.ingredient' => SORT_DESC],
];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'ingredient1' => $this->ingredient1,
            'ingredient2' => $this->ingredient2,
            'ingredient3' => $this->ingredient3,
            'ingredient4' => $this->ingredient4,
            'ingredient5' => $this->ingredient5,
        ]);

        $query->andFilterWhere(['like', 'dish', $this->dish])
              ->andFilterWhere(['like', 'ingredient10.ingredient', $this->ingredient1_name])
              ->andFilterWhere(['like', 'ingredient20.ingredient', $this->ingredient2_name])
              ->andFilterWhere(['like', 'ingredient30.ingredient', $this->ingredient3_name])
              ->andFilterWhere(['like', 'ingredient40.ingredient', $this->ingredient4_name])
              ->andFilterWhere(['like', 'ingredient50.ingredient', $this->ingredient5_name]);

        return $dataProvider;
    }
}
