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
            throw new InvalidParamException('重置密码令牌无效或者已经过期');
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

        //动态添加password属性
        //为什么这里不需要对密码进行加密就保存，还是说已经加密了？
        $user->password =  $this->password;

        //$user->setPassword($this->password);

        //移除重置密码的令牌
        $user->removePasswordResetToken();

        return $user->save();
    }



}
?>