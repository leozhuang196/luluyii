<?php
namespace app\modules\user\models;

use Yii;
use yii\base\Model;
use app\modules\user\models\User;
use yii\base\InvalidParamException;

class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;

    public $repassword;
    public $verifyCode;

    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            //汉字的unicode范围是：0x4E00~0x9FA5，其实这个范围还包括了中，日，韩的字符
            //  u 表示按unicode(utf-8)匹配（主要针对多字节比如汉字）
            //  \x忽略空白
            //[(\x{4E00}-\x{9FA5})a-zA-Z]+表示以汉字或者字母开头，出现1-n次
            //[(\x{4E00}-\x{9FA5})\w]*表示以汉字字母数字下划线组成，出现0-n次
            //^是开始符号  $是结尾符号        / /是界定符
            ['username', 'match','pattern'=>'/^[(\x{4E00}-\x{9FA5})a-zA-Z]+[(\x{4E00}-\x{9FA5})\w]*$/u','message'=>'用户名由字母，汉字，数字，下划线组成，且不能以数字和下划线开头。'],
            ['username', 'unique', 'targetClass' => 'app\modules\user\models\User', 'message' => '用户名已经被注册过.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => 'app\modules\user\models\User', 'message' => '邮箱已经被使用过.'],

            [['password','repassword'],'required'],
            [['password','repassword'], 'string', 'min' => 6],
            ['repassword','compare','compareAttribute'=>'password','message' => '两次输入的密码不一致'],
            //这里也需要添加captchaAction进行验证码的验证
            ['verifyCode', 'captcha','captchaAction'=>'/user/signup/captcha'],
        ];
    }

    public function attributeLabels()
    {
        return
        [
            'username' => '用户名',
            'password' => '密码',
            'repassword' => '重复密码',
            'email' => '邮箱',
            'verifyCode'=>'验证码',
        ];
    }

    public function init()
    {
        parent::init();
        \Yii::$app->set('mailer', [
            'class' => 'yii\swiftmailer\Mailer',
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => yii::$app->params['smtpHost'],
                'username' => yii::$app->params['smtpUser'],
                'password' => yii::$app->params['smtpPassword'],
                'port' => yii::$app->params['smtpPort'],
                'encryption' => 'tls',
        ]]);
    }

    public function signup()
    {
        if ($this->validate()) {
            $user = new User();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->setPassword($this->password);
            $user->generateAuthKey();

            //通过生成token进行邮箱的验证
            if(!User::isPasswordResetTokenValid($user->password_reset_token)){
                $user->generatePasswordResetToken();
            }

            if($user->save()){
                return  yii::$app->mailer->compose('ActivateAccountToken',['user'=>$user])
                ->setFrom([yii::$app->params['smtpUser'] => yii::$app->name])
                ->setTo($this->email)
                ->setSubject(yii::$app->name.'激活账号')
                ->send();
            }
        }

        return null;
    }

    //用户进行邮箱验证时删除token
    public function removeToken($token)
    {
        if(empty($token) || !is_string($token)){
            throw new InvalidParamException('激活账号的令牌不能为空');
        }
        $user = User::findByPasswordResetToken($token);
        if(!$user){
            throw new InvalidParamException('激活账号的令牌已经过期');
        }
        $user->removePasswordResetToken();
        return $user->save();
    }
}
