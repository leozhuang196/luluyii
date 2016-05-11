<?php
namespace modules\user\models;
use Yii;
use yii\behaviors\TimestampBehavior;

class UserMessage extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return '{{%user_message}}';
    }
    
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('user', 'ID'),
            'from' => Yii::t('user', 'From'),
            'to' => Yii::t('user', 'To'),
            'content' => Yii::t('user', 'Content'),
            'created_time' => Yii::t('user', 'Created Time'),
        ];
    }
}
