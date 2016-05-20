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
    
    public static function getSex($sex) {
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
    
    //下拉筛选
    public static function dropDown ($column, $value = null)
    {
        $dropDownList = [
            "sex"=> [
                "0"=>"男",
                "1"=>"女",
                '2'=>'保密',
            ],
        ];
        //根据具体值显示对应的值
        if ($value !== null){
            return array_key_exists($column, $dropDownList) ? $dropDownList[$column][$value] : false;
            //返回关联数组，用户下拉的filter实现
        }else{
            return array_key_exists($column, $dropDownList) ? $dropDownList[$column] : false;
        }
    }
    
    public function saveImage($model)
    {
        $image = UploadedFile::getInstance($model, 'image');
        if($image === NULL || !in_array($image->getExtension(), ['jpg','png','jpeg']) || $image->size > 200000){
            return null;
        }
        $imageName = md5(time().$image->name).'.'.$image->getExtension();
        $userPath = 'userImage/'.$model->user_id;
        $path = Yii::getAlias('@images').'/'.$userPath;
        $pic = $userPath.'/'.$imageName;
        //创建文件夹
        if (!is_dir($path) && !mkdir($path,0777,true) && chmod($path,0777)) {
            return null;
        }
        //保存图片
        /* if (!$image->saveAs($path.'/'.$imageName)) {
            return null;
        } */
        if (!move_uploaded_file($image->tempName, $path.'/'.$imageName)) {
            return null;
        }
        //如果不是默认的头像，用户更新头像的时候删除之前更新过的头像，避免默认头像被删除
        //这里$modle->image=null，所以得重新获取image，原因：可能是前面被置空了
        $user_info = UserInfo::findOne(['user_id'=>$model->user_id]);
        if($user_info->image !== \Yii::$app->params['defaultUserImage']){
            if(isset($user_info->image) && $user_info->image!=null){
                unlink(Yii::getAlias('@images').'/'.$user_info->image);
            }
        }
        if ($this->validate()){
            $user_info->image = $pic;
            return $user_info->save();
        }
    }
    
    public static function showImage($model,$option=['width'=>'35','height'=>'35']) {
        return Html::img(Yii::$app->params['imageDomain'].'/'.$model->image,['width'=> $option['width'],'height'=>$option['height']]);
    }
}