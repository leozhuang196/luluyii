<?php

namespace app\modules\user\models;

use Yii;
use yii\base\Model;

class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    private $_user = false;

    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            ['rememberMe', 'boolean'],
            ['password', 'validatePassword'],
        ];
    }

   public function attributeLabels()
   {
       return [
           'username' => '用户名 / 邮箱',
           'password' => Yii::t('user', 'Password'),
           'rememberMe' => Yii::t('user', 'Remember Me'),
       ];
   }
    //验证密码的正确性
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user){
                $this->addError($attribute, '用户不存在');
            //由于注册的时候是通过生成token进行邮箱验证才可以登陆的，邮箱验证后token被删除，
            //所以当token存在时表名用户还未进行邮箱验证
            }else if($user['password_reset_token']!==null){
                $this->addError($attribute,'请验证邮箱后再登录');
            }else if (!$user->validatePassword($this->password)){
                $this->addError($attribute, '密码错误');
            }
        }
    }

    public function login()
    {
        //验证输入的是否满足规则，包含验证密码的正确性
        if ($this->validate()) {
            //把登录之后的状态设置到session中
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
        }
        return false;
    }

    public function getUser()
    {
        if ($this->_user === false) {
            //strpos() 函数查找字符串在另一字符串中第一次出现的位置
            //由于邮箱中带有@字符，可用来区别是用户名还是邮箱
            if(strpos($this->username, '@')){
                $this->_user = User::findByEmail($this->username);
            }else{
                $this->_user = User::findByUsername($this->username);
            }

        }

        return $this->_user;
    }
}
