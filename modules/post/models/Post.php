<?php
namespace modules\post\models;
use Yii;

class Post extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return '{{%post}}';
    }

    public function rules()
    {
        return [
            [['user_id', 'author', 'content', 'type', 'description', 'created_time'], 'required'],
            [['user_id', 'love_num', 'hate_num', 'comment_num', 'view_num', 'collection', 'created_time'], 'integer'],
            [['author'], 'string', 'max' => 12],
            [['content'], 'string', 'max' => 255],
            [['type'], 'string', 'max' => 10],
            [['description'], 'string', 'max' => 100]
        ];
    }
    
    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios['create'] = ['author', 'content'];
        return $scenarios;
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
            'description' => Yii::t('post', 'Description'),
            'created_time' => Yii::t('post', 'Created Time'),
        ];
    }
}
