<?php
namespace app\models;
use Yii;

class Visit extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return '{{%user_visit}}';
    }
    
    //访问的日访问人数
    public static function visitNum()
    {
        $visit_ip = Yii::$app->request->userIP;
        $visit = Visit::findOne(['visit_ip' => $visit_ip]);
        $yesterdayZeroTime = mktime(0,0,0,date('m')-1,date('d'),date('Y'));
        if ($visit && $visit->visit_time>$yesterdayZeroTime){
            $visit->visit_time = time();
            $visit->save();
        }else{
            $visit = new Visit();
            $visit->visit_ip = $visit_ip;
            $visit->visit_time = time();
            $visit->save();
        }
        return Visit::find()->where(['>','visit_time',$yesterdayZeroTime])->count();
    }
}