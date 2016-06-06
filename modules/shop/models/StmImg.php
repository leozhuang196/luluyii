<?php
namespace modules\shop\models;

use Yii;

class StmImg extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return '{{%stm_img}}';
    }

    public function rules()
    {
        return [
            [['stm_id', 'pic', 'title'], 'required'],
            [['stm_id'], 'integer'],
            [['pic', 'title'], 'string', 'max' => 255],
            [['stm_id'], 'exist', 'skipOnError' => true, 'targetClass' => Stm::className(), 'targetAttribute' => ['stm_id' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('shop', 'ID'),
            'stm_id' => Yii::t('shop', 'Stm ID'),
            'pic' => Yii::t('shop', 'Stm Pic'),
            'title' => Yii::t('shop', 'Stm Title'),
        ];
    }
    public function getStm()
    {
        return $this->hasOne(Stm::className(), ['id' => 'stm_id']);
    }
}
