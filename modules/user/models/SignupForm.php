<?php
namespace app\modules\user\models;

use Yii;
use yii\base\Model;
use app\modules\user\models\User;

/**
 * Signup form
 */
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

    public function signup()
    {
        if ($this->validate()) {
            $user = new User();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            if ($user->save()) {
                return $user;
            }
        }

        return null;
    }
}
