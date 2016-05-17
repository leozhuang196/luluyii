<?php
namespace modules\user\models;
use Yii;
use yii\web\UploadedFile;
use yii\helpers\Html;

class UserInfo extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return '{{%user_info}}';
    }

    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'sex', 'qq','score','signin_time','signin_day'], 'integer'],
            [['location','birthday','image','signature'], 'string', 'max' => 255]
        ];
    }
    
    public function attributeLabels()
    {
        return [
            'user_id' => Yii::t('user', 'User Id'),
            'signin_time' => Yii::t('user','Signin Time'),
            'signin_day' => Yii::t('user','Signin Day'),
            'image' => Yii::t('user', 'Image'),
            'score' => Yii::t('user', 'Score'),
            'sex' => Yii::t('user', 'Sex'),
            'signature' => Yii::t('user', 'Signature'),
            'qq' => Yii::t('user', 'Qq'),
            'location' => Yii::t('user', 'Location'),
            'birthday' => Yii::t('user','Birthday'),
            'message' => Yii::t('user', 'Message'),
            'message_from' => Yii::t('user', 'Message From'),
        ];
    }
    
    public function getSex($sex) {
        switch ($sex){
            case '0':
                return '男';
            break;
            case '1':
                return '女';
            break;
            case '2':
                return '保密';
            default:
                return NUll;
            break;
        }
    }
    
    public function saveImage($model)
    {
        $image = UploadedFile::getInstance($model, 'image');
        if($image === NULL || !in_array($image->getExtension(), ['jpg','png','jpeg']) || $image->size > 200000){
            return false;
        }
        $randName = time().'.'.$image->getExtension();
        $rootPath = 'images/'.date('Y',time()).'/';
        if (!file_exists($rootPath)) {
            mkdir($rootPath);
        }
        $image->saveAs($rootPath . $randName);
        $user_info = UserInfo::findOne(['user_id' => Yii::$app->user->id]);
        //如果不是默认的头像，用户更新头像的时候删除之前更新过的头像，避免默认头像被删除
        if($user_info->image !== \Yii::$app->params['defaultUserImage']){
            unlink($user_info->image);
        }
        $user_info->image = $rootPath . $randName;
        return $user_info->save();
    }
    
    public static function showImage($model,$option=['width'=>'35','height'=>'35']) {
        return Html::img('@web/'.$model->image,['width'=> $option['width'],'height'=>$option['height']]);
    }
}
