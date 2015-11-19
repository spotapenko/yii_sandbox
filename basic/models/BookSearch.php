<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Book;

/**
 * BookSearch represents the model behind the search form about `app\models\Book`.
 */
class BookSearch extends Book
{
    public $author_fullname;
    public $date_from;
    public $date_to;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
          [['author_id'], 'integer'],
          [['name', 'date_from', 'date_to', 'author_fullname'], 'safe'],
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
        if (!isset($params["BookSearch"])) {
            if (isset(Yii::$app->session["book_search"])){
                $params["BookSearch"]=Yii::$app->session["book_search"];
            }
        }
        else{
            Yii::$app->session["book_search"]=$params["BookSearch"];
        }

        $query = Book::find();

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
            'name',
            'preview',
            'date',
            'author_fullname' => [
              'asc' => ['authors.firstname' => SORT_ASC, 'authors.lastname' => SORT_ASC],
              'desc' => ['authors.firstname' => SORT_DESC, 'authors.lastname' => SORT_DESC],
              'label' => 'Author',
              'default' => SORT_ASC
            ],
          ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            /**
             * The following line will allow eager loading with country data
             * to enable sorting by country on initial loading of the grid.
             */
            $query->joinWith(['author']);
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
          'id' => $this->id,
          'date_create' => $this->date_create,
          'date_update' => $this->date_update,
          'date' => $this->date,
          'author_id' => $this->author_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
          ->andFilterWhere(['like', 'preview', $this->preview]);

        $query->andFilterWhere(['>=', 'date', $this->date_from]);
        $query->andFilterWhere(['<=', 'date', $this->date_to]);

        //todo: need fix search by fullname with concat strings
        $query->joinWith([
          'author' => function ($q) {
              $q->where('authors.firstname LIKE "%' . $this->author_fullname . '%" ' .
                'OR authors.lastname LIKE "%' . $this->author_fullname . '%"'
              );
          }
        ]);

        return $dataProvider;
    }
}
