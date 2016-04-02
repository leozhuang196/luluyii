<?php
namespace app\models;
use Yii;

class Config extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return '{{%config}}';
    }

    public function rules()
    {
        return [
            [['key', 'value'], 'required'],
            [['value'], 'string'],
            [['key'], 'string', 'max' => 64]
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'key' => 'Key',
            'value' => 'Value',
        ];
    }
}