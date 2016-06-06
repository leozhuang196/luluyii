<?php
namespace modules\post\models;

use Yii;

class PostCollection extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return '{{%post_collection}}';
    }

    public function rules()
    {
        return [
            [['post_id', 'user_id'], 'required'],
            [['post_id', 'user_id'], 'integer']
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('post', 'ID'),
            'post_id' => Yii::t('post', 'Post ID'),
            'user_id' => Yii::t('post', 'User ID'),
        ];
    }
    
    public static function exitCollect($id)
    {
        return PostCollection::findOne(['user_id'=> \Yii::$app->user->id,'post_id'=>$id]);
    }
    
    public function nocollect($collect)
    {
        return PostCollection::delete(['user_id'=>$collect->id,'post_id'=>$collect->post_id]);
    }
}
