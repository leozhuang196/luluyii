<?php
namespace app\models;
use Yii;

class ContactForm extends \yii\base\Model
{
    public $name;
    public $email;
    public $subject;
    public $body;
    public $verifyCode;

    public function rules()
    {
        return [
            [['name', 'email', 'subject', 'body'], 'required'],
            ['email', 'email'],
            ['verifyCode', 'captcha'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => '姓名',
            'email' => '邮箱',
            'subject' => '主题',
            'body' => '内容',
            'verifyCode' => '验证码',
        ];
    }

    public function init()
    {
        parent::init();
        //使用文件传输，将发送的邮件设置在@runtime/mail文件夹中
        Yii::$app->set('mailer', ['class' => 'yii\swiftmailer\Mailer','useFileTransport' => true]);
    }
    
    public function contact($email)
    {
        if ($this->validate()) {
            Yii::$app->mailer->compose()
                ->setTo($email)
                ->setFrom([$this->email => $this->name])
                ->setSubject($this->subject)
                ->setTextBody($this->body)
                ->send();
            return true;
        }
        return false;
    }
}