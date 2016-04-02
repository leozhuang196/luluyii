<?php

namespace app\models\config;

use Yii;
use app\models\Config;
use yii\base\Security;

class BaseConfig extends \yii\db\ActiveRecord
{
    public function inits()
    {
        $this->initAll();
    }

    public function saves()
    {
        $this->saveAll();
    }

    private function getCongfigKeys()
    {
        //$models->attributes()可获取非静态函数公共属性
        //array_keys()返回包含数组中所有键名的一个新数组
        return array_keys($this->attributeLabels());
    }

    private function saveAll()
    {
        $keys = $this->getCongfigKeys();
        foreach ($keys as $key){
            //$this->$key表示当前对象属性的值
            //比如ThemeConfig的属性是sys_site_theme，值就是你写入的值
            Config::updateAll(['value'=>$this->$key],['`key`'=>$key]);
        }
    }

    private function initAll()
    {
        $keys = $this->getCongfigKeys();
        foreach ($keys as $key){
            $this->initOne($key);
        }
    }

    private function initOne($key,$defaultKey='')
    {
        $model = Config::findOne(['`key`'=>$key]);
        if($model!=null){
            $this->$key = $model->value;
        }else{
            $this->$key = $defaultKey;
        }
    }

}
