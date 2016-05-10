<?php
namespace modules\user\models;
use Yii;
use yii\base\Model;
use yii\web\Response;

class SendMessageForm extends Model
{
    public $username;
    public $message;
    private $_user = false;

    public function rules()
    {
        return [
            [['username','message'],'required'],
            ['username','string','min'=>2,'max'=>12],
            ['message','string','max'=>255],
            ['username','exist','targetClass' => 'modules\user\models\User','message' => '用户不存在']
        ];
    }

    public function attributeLabels()
    {
        return [
            'username'=> '收信人',
            'message'=> '信息内容',
        ];
    }

    public function sendMessage()
    {
        if ($this->validate()){
            $user_info = UserInfo::findOne(['user_id' => User::findOne(['username'=>$this->username])['id']]);
            $user_info->message = $this->message;
            $user_info->message_from = $this->getUser()->username;
            return $user_info->save();
        }
        return null;
    }

    public function getUser()
    {
        if($this->_user===false){
            $this->_user = Yii::$app->user->identity;
        }
        return $this->_user;
    }
}