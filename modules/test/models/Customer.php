<?php
namespace modules\test\models;
use yii\db\ActiveRecord;

class Customer extends ActiveRecord
{
    public function getOrder()
    {
        //第一个customer_id是Order表中的字段，第二个customer_id是Customer表中的字段
        //比如查询1号订单的顾客资料，1号订单的customer_id=1
        //然后在Customer表中查询customer_id=1的顾客资料
        return $this->hasMany(Order::className(),['customer_id' => 'customer_id'])->asArray()->all();
    }
}