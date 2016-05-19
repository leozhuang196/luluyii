<?php
namespace modules\post\models;
use yii\data\ActiveDataProvider;
use modules\post\models\Post;

class PostSearch extends Post
{
    public function rules()
    {
        return [
            [['id', 'user_id', 'love_num', 'hate_num', 'comment_num', 'view_num', 'collection', 'created_time'], 'integer'],
            [['author', 'content', 'type', 'title'], 'safe'],
        ];
    }

    public function search($params)
    {
        $query = Post::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pagesize' => '5', //如果不定义，默认为20
            ],
            //'sort' => ['attributes' => ['id']],//如果定义，则只能按照id来排序，否则所有字段都可以
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
            ->andFilterWhere(['like', 'title', $this->title]);
        return $dataProvider;
    }
}