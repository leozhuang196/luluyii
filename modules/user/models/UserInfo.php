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
            [['sex'], 'integer'],
            [['qq'], 'string', 'max' => 100],
            [['location'], 'string', 'max' => 10]
        ];
    }

    public function attributeLabels()
    {
        return [
            'sex' => Yii::t('user', 'Sex'),
            'qq' => Yii::t('user', 'Qq'),
            'location' => Yii::t('user', 'Location'),
        ];
    }
}
