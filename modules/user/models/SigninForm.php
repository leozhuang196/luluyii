<?php
namespace modules\user\models;
use Yii;
use yii\base\Model;
use modules\user\models\UserInfo;

class SigninForm extends Model
{
    public function signin()
    {
        $userInfo = UserInfo::findOne(['user_id' => Yii::$app->user->id]);
        $todayZeroTime = mktime(0,0,0,date('m'),date('d'),date('Y'));
        $tomorrowZeroTime = mktime(0,0,0,date('m'),date('d')+1,date('Y'));
        if ($todayZeroTime<$userInfo->signin_time && $userInfo->signin_time<$tomorrowZeroTime){
            return null;
        }else {
            $userInfo->signin_time = time();
            $userInfo->score ++;
            return $userInfo->save();
        }
    }
}