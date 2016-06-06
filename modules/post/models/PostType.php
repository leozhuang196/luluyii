<?php
namespace modules\post\models;

use Yii;

class PostType extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return '{{%post_type}}';
    }

    public function rules()
    {
        return [
            [['type_id', 'name'], 'required'],
            [['type_id'], 'integer'],
            [['name'], 'string', 'max' => 45]
        ];
    }

    public function attributeLabels()
    {
        return [
            'type_id' => Yii::t('post', 'Type ID'),
            'name' => Yii::t('post', 'Name'),
        ];
    }
}
