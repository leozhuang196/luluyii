<?php
namespace modules\user\models;

class UserFans extends \yii\db\ActiveRecord
{
    public static function exitFocus($focus_who)
    {
        $from = User::getUser()->username;
        return UserFans::findOne(['from' => $from,'to' => $focus_who]);
    }
    
    public static function fansNums($username)
    {
        return UserFans::find()->where(['to'=>$username])->count();
    }
    
    public static function focusNums($username)
    {
        return UserFans::find()->where(['from'=>$username])->count();
    }
    
    public static function showFans($username)
    {
        return UserFans::find()->where(['to'=>$username])->all();
    }
    
    public static function showFocus($username)
    {
        return UserFans::find()->where(['from'=>$username])->all();
    }
    
    public function focus($focus_who)
    {
        $from = User::getUser()->username;
        $user_fans = new UserFans();
        if(!$this->exitFocus($focus_who)){
            $user_fans->from = $from;
            $user_fans->to = $focus_who;
            $user_fans->focus_time = time();
            return $user_fans->save();
        }
        return null;
    }
    
    public function nofocus($focus_fans)
    {
        return UserFans::delete(['from'=>$focus_fans->from,'to'=>$focus_fans->to]);
    }
}