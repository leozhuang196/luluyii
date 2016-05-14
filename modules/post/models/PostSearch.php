<?php
namespace modules\post\models;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use modules\post\models\Post;

class PostSearch extends Post
{
    public function rules()
    {
        return [
            [['id', 'user_id', 'love_num', 'hate_num', 'comment_num', 'view_num', 'collection', 'created_time'], 'integer'],
            [['author', 'content', 'type', 'description'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Post::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $this->load($params);
        if (!$this->validate()) {
            return $dataProvider;
        }
        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'love_num' => $this->love_num,
            'hate_num' => $this->hate_num,
            'comment_num' => $this->comment_num,
            'view_num' => $this->view_num,
            'collection' => $this->collection,
            'created_time' => $this->created_time,
        ]);
        $query->andFilterWhere(['like', 'author', $this->author])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'description', $this->description]);
        return $dataProvider;
    }
}