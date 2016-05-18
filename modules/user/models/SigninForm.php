<?php
namespace modules\user\models;
use yii\base\Model;
use modules\user\models\UserInfo;

class SigninForm extends Model
{
    public static function signin()
    {
        $userInfo = UserInfo::findOne(['user_id' => User::getUser()->id]);
        $yesterdayZeroTime = mktime(0,0,0,date('m')-1,date('d'),date('Y'));
        $todayZeroTime = mktime(0,0,0,date('m'),date('d'),date('Y'));
        //如果昨天签到过，签到次数+1
        if ($userInfo->signin_time>$yesterdayZeroTime && $userInfo->signin_time<$todayZeroTime){
            $userInfo->signin_day++;
        }else{
            //如果昨天没有签到，或者从没有签到，连续签到次数=1
            $userInfo->signin_day=1;
        }
        $userInfo->signin_time = time();
        $userInfo->score ++;
        return $userInfo->save();
    }
    
    public static function isNotSignin()
    {
        if(\Yii::$app->user->isGuest){
            return true;
        }
        $userInfo = UserInfo::findOne(['user_id' => User::getUser()->id]);
        $todayZeroTime = mktime(0,0,0,date('m'),date('d'),date('Y'));
        if ($userInfo->signin_time<$todayZeroTime){
            return true;
        }
        return false;
    }
    
    //签到会员人数
    public static function siginNum()
    {
        $todayZeroTime = mktime(0,0,0,date('m'),date('d'),date('Y'));
        return UserInfo::find()->where(['>','signin_time',$todayZeroTime])->count();
    }
    
    //签到的全部会员
    public function siginMembers()
    {
        $todayZeroTime = mktime(0,0,0,date('m'),date('d'),date('Y'));
        return UserInfo::find()->where(['>','signin_time',$todayZeroTime])->orderBy(['signin_day'=>SORT_DESC])->all();
    }
    
    //个人连续签到天数
    public static function siginDay()
    {
        return UserInfo::findOne(['user_id'=>User::getUser()->id])->signin_day;
    }
}