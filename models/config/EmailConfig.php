<?php

namespace app\models\config;

use Yii;
use app\models\config\BaseConfig;
use app\models\Config;

class EmailConfig extends BaseConfig
{
    public $smtpHost;
    public $smtpUser;
    public $smtpPassword;
    public $smtpPort;

    public static function tableName()
    {
        return '{{%config}}';
    }

    public function rules()
    {
        return [
            [['smtpHost', 'smtpUser','smtpPassword','smtpPort'], 'required'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'smtpHost' => '主机名',
            'smtpUser' => '用户名',
            'smtpPassword' => '密码',
            'smtpPort' => '端口',
        ];
    }

    public static function getKey($key)
    {
        if (!$key) return ;
        $email = Config::findOne(['`key`'=>$key]);
        if ($email){
            return $email->value;
        }
        return ;
    }
}
