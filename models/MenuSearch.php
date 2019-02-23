<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Dishes;

/**
 * MenuSearch represents the model behind the search form of `app\models\Menu`.
 */
class MenuSearch extends Dishes
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'ingredient1', 'ingredient2', 'ingredient3', 'ingredient4', 'ingredient5'], 'integer'],
            [['dish'], 'safe'],
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
        $query = Dishes::find();


        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
        //    'id' => $this->id,
        //    'id_dishes' => $this->id_dishes,
              'ingredient1' => $this->ingredient1,
        //    'ingredient2' => $this->ingredient2,
        //    'ingredient3' => $this->ingredient3,
        //    'ingredient4' => $this->ingredient4,
         //   'ingredient5' => $this->ingredient5,
        ]);

     //   $query->andFilterWhere(['like', 'dish', $this->dish]);
        
        
        return $dataProvider;
    }
}
