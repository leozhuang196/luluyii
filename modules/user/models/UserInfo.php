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
            'sex' => Yii::t('user', 'Sex'),
            'qq' => Yii::t('user', 'Qq'),
            'location' => Yii::t('user', 'Location'),
            'birthday' => Yii::t('user','Birthday'),
        ];
    }
}
