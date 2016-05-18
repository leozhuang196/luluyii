<?php
namespace modules\post\models;
use Yii;
use modules\user\models\User;

class Post extends \yii\db\ActiveRecord
{
    const POST_TYPE_CHAT = 1;
    const POST_TYPE_TUTORIAL = 2;
    const POST_TYPE_QUESTION = 3;
    
    public static function tableName()
    {
        return '{{%post}}';
    }

    public function rules()
    {
        return [
            [['user_id', 'title', 'author', 'content', 'created_time'], 'required'],
            [['user_id', 'love_num', 'hate_num', 'comment_num', 'view_num', 'collection', 'created_time'], 'integer'],
            [['title'], 'string', 'max' => 100],
            [['author'], 'string', 'max' => 12],
            [['content'], 'string', 'max' => 10000],
            [['type'], 'string', 'max' => 10]
        ];
    }
    
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('post', 'ID'),
            'user_id' => Yii::t('post', 'User ID'),
            'author' => Yii::t('post', 'Author'),
            'love_num' => Yii::t('post', 'Love Num'),
            'hate_num' => Yii::t('post', 'Hate Num'),
            'comment_num' => Yii::t('post', 'Comment Num'),
            'view_num' => Yii::t('post', 'View Num'),
            'collection' => Yii::t('post', 'Collection'),
            'content' => Yii::t('post', 'Content'),
            'type' => Yii::t('post', 'Type'),
            'title' => Yii::t('post', 'Title'),
            'created_time' => Yii::t('post', 'Created Time'),
        ];
    }
    
    public static function getPostType($type)
    {
        switch ($type){
            case Post::POST_TYPE_QUESTION: 
                return '问答';
            break;
            case Post::POST_TYPE_CHAT: 
                return '闲聊';
            break;
            default:
                return '教程';
            break;
        }
    }
}