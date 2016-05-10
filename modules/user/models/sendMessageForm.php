<?php
namespace modules\user\models;
use Yii;
use yii\base\Model;

class SendMessageForm extends Model
{
    public $username;
    public $message;
    
    public function rules()
    {
        return [
            [['username', 'message'], 'required'],
            ['rememberMe', 'boolean'],
            ['username','exist',
                'targetClass' => 'modules\user\models\User',
                'message' => '用户不存在',
            ],
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
   
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user){
                $this->addError('username', '用户不存在');
            }else if($user['password_reset_token']!==null || $user->status!==User::STATUS_ACTIVE){
                $this->addError('username','请验证邮箱后再登录');
            }else if(!$user->validatePassword($this->password)){
                $this->addError('password', '密码错误');
            }
        }
    }

    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
        }
        return false;
    }

    public function getUser()
    {
        if ($this->_user === false) {
            if(strpos($this->username, '@')){
                $this->_user = User::findByEmail($this->username);
            }else{
                $this->_user = User::findByUsername($this->username);
            }
        }
        return $this->_user;
    }
}