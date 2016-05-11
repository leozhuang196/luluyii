<?php
namespace modules\user\models;
use Yii;

class UserFans extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return '{{%user_fans}}';
    }

    public function rules()
    {
        return [
            [['from', 'to'], 'required'],
            [['from', 'to'], 'string', 'max' => 12]
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('user', 'ID'),
            'from' => Yii::t('user', 'From'),
            'to' => Yii::t('user', 'To'),
        ];
    }
    
    public static function exitFocus($focus_who)
    {
        $from = Yii::$app->user->identity->username;
        return UserFans::findOne(['from' => $from,'to' => $focus_who]);
    }
    
    public function focus($focus_who)
    {
        $from = Yii::$app->user->identity->username;
        $user_fans = new UserFans();
        if(!$this->exitFocus($focus_who)){
            $user_fans->from = $from;
            $user_fans->to = $focus_who;
            return $user_fans->save();
        }
        return null;
    }
    
    public function nofocus($focus_fans)
    {
        return UserFans::delete(['from'=>$focus_fans->from,'to'=>$focus_fans->to]);
    }
}