<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Author;

/**
 * AuthorSearch represents the model behind the search form about `app\models\Author`.
 */
class AuthorSearch extends Author
{
    public $fullname;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [[ 'firstname', 'lastname', 'fullname'], 'safe'],
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
        $query = Author::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        /**
         * Setup your sorting attributes
         * Note: This is setup before the $this->load($params)
         * statement below
         */
        $dataProvider->setSort([
          'attributes' => [
            'id',
            'firstname',
            'lastname',
            'fullname' => [
              'asc' => ['firstname' => SORT_ASC, 'lastname' => SORT_ASC],
              'desc' => ['firstname' => SORT_DESC, 'lastname' => SORT_DESC],
              'label' => 'Full Name',
              'default' => SORT_ASC
            ],
            'author_id'
          ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'firstname', $this->firstname])
            ->andFilterWhere(['like', 'lastname', $this->lastname]);

        // filter by person full name
        $query->andWhere('firstname LIKE "%' . $this->fullname . '%" ' .
          'OR lastname LIKE "%' . $this->fullname . '%"'
        );

        return $dataProvider;
    }
}
