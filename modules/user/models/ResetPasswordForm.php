<?php
namespace modules\user\models;
use Yii;
use yii\base\Model;
use modules\user\models\User;
use yii\web\NotFoundHttpException;

class ResetPasswordForm extends Model
{
    public $new_password;
    public $renew_password;
    private $_user;

    //$token是用户点击链接时传递过来的
    public function __construct($token)
    {
        if(empty($token) || !is_string($token)){
            throw new NotFoundHttpException('激活账号的令牌不能为空，请到邮箱再次点击链接重置您的密码');
        }
        //通过token获取当前用户的所有数据
        $this->_user = User::findByPasswordResetToken($token);
        if(!$this->_user){
            throw new NotFoundHttpException('重置密码的邮件已经过期，请重新找回密码');
        }
    }

    public function rules()
    {
        return [
            [['new_password','renew_password'],'required'],
            [['new_password','renew_password'],'string','min'=>6],
            ['renew_password','compare','compareAttribute'=>'new_password','message'=>'两次输入的密码不一致']
        ];
    }

    public function attributeLabels()
    {
        return [
            'new_password'=> Yii::t('user', 'New Password'),
            'renew_password'=> Yii::t('user', 'Renew Password'),
        ];
    }

    public function resetPassword()
    {
        $user = $this->_user;
        //$user->password =  $this->password使用的是php的魔术方法，当调用不存在的属性/方法时，会调用__set()方法
        //由于User::setPassword()的基类中BaseActiveRecord有__set()方法
        //当$user->password其实访问的就是User::setPassword()方法
        $user->setPassword($this->new_password);
        //移除重置密码的令牌
        $user->removePasswordResetToken();
        return $user->save();
    }
}