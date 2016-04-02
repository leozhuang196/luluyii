<?php
namespace app\modules\user\models;
use yii\base\Model;
use yii\base\InvalidParamException;

class ResetPasswordForm extends Model
{
    public $password;
    public $repassword;
    private $_user;

    //$token是从连接处传递过来的
    public function __construct($token)
    {
        if(empty($token) || !is_string($token)){
            throw new InvalidParamException('重置密码的令牌不能为空');
        }
        //通过token获取当前用户的所有数据
        $this->_user = User::findByPasswordResetToken($token);
        if(!$this->_user){
            throw new InvalidParamException('重置密码令牌已经过期');
        }
    }

    public function rules()
    {
        return [
            [['password','repassword'],'required'],
            [['password','repassword'],'string','min'=>6],
            ['repassword','compare','compareAttribute'=>'password','message'=>'两次输入的密码不一致']
        ];
    }

    public function attributeLabels()
    {
        return [
            'password'=>'密码',
            'repassword'=>'重复密码',
        ];
    }

    public function resetPassword()
    {
        $user = $this->_user;

       //这里其实使用的是php的魔术方法
       //当调用不存在的属性/方法时，会调用__set()方法
       //由于User::setPassword()的基类中BaseActiveRecord有__set()方法
       //当$user->password其实访问的就是User::setPassword()方法
       //$user->password =  $this->password;

       $user->setPassword($this->password);
        //移除重置密码的令牌
        $user->removePasswordResetToken();

        return $user->save();
    }



}
?>