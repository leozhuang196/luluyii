<?php
namespace modules\user\models;
use Yii;

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
            [['user_id', 'sex', 'qq'], 'integer'],
            [['location','birthday'], 'string', 'max' => 255]
        ];
    }
    
    public function attributeLabels()
    {
        return [
            'user_id' => Yii::t('user', 'User Id'),
            'sex' => Yii::t('user', 'Sex'),
            'qq' => Yii::t('user', 'Qq'),
            'location' => Yii::t('user', 'Location'),
            'birthday' => Yii::t('user','Birthday'),
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
}
