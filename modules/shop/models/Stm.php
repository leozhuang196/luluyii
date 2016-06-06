<?php
namespace modules\shop\models;

use Yii;

class Stm extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return '{{%shop_stm}}';
    }

    public function rules()
    {
        return [
            [['is_use', 'stm_type'], 'required'],
            [['is_use', 'stm_type'], 'integer'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('shop', 'ID'),
            'is_use' => Yii::t('shop', 'Is Use'),
            'stm_type' => Yii::t('shop', 'Stm Type'),
        ];
    }

    public function getStmImgs()
    {
        return $this->hasOne(StmImg::className(), ['stm_id' => 'id']);
    }
}
