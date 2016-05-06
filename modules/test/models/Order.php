<?php
namespace modules\test\models;
use yii\db\ActiveRecord;

class Order extends ActiveRecord
{
    public function getCustomer()
    {
        //第一个customer_id是Customer表中的字段，第二个customer_id是Order表中的字段
        //比如查询zhangsan的订单，zhangsan的customer_id=1
        //然后在Order表中查询customer_id=1的订单
        return $this->hasOne(Customer::className(),['customer_id' => 'customer_id'])->asArray()->one();
    }
}