<?php
namespace app\modules\user\models;
use Yii;
use yii\base\Model;

class InformationForm extends Model
{
    public $email;
    public $job;
    
    public static function tableName()
    {
        return '{{%information}}';
    }

    public function rules()
    {
        return [
            [['email', 'job'], 'required'],
            [['email'], 'eamil'],
            [['job'], 'string', 'max' => 64]
        ];
    }

    public function attributeLabels()
    {
        return [
            'email' => '您的邮箱',
            'job' => '您的工作',
        ];
    }

    public function modifyPassword()
    {
        if ($this->validate()){
            $user = $this->getUser();
            $user->setPassword($this->new_password);
            return $user->save();
        }
    }

    //获取当前登录用户的信息
    public function getUser()
    {
        if($this->_user===false){
            $this->_user = \Yii::$app->user->identity;
        }
        return $this->_user;
    }

}
?>