<?php
namespace modules\post\models;
use Yii;
use yii\base\Model;
use modules\post\models\Post;

class CreatePostForm extends Model
{
    public $description;
    public $content;
    public $type;

    public function createPost()
    {
        if ($this->validate()) {
            $author = Yii::$app->user->identity->username;
            $user_id = Yii::$app->user->id;
            $post = new Post();
            $post->author = $author;
            $post->user_id = $user_id;
            $post->created_time = time();
            if ($this->description == NULL){
                $this->description = substr($this->content, 0,20);
            }
            $post->description = $this->description;
            $post->content = $this->content;
            $post->type = $this->type;
            return $post->save();
        }
        return null;
    }
}