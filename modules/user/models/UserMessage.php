<?php
namespace modules\user\models;
use Yii;

class UserMessage extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return '{{%user_message}}';
    }
    
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('user', 'ID'),
            'from' => Yii::t('user', 'From'),
            'to' => Yii::t('user', 'To'),
            'content' => Yii::t('user', 'Content'),
            'send_time' => Yii::t('user', 'Created Time'),
        ];
    }
}
