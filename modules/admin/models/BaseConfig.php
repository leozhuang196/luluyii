<?php
namespace modules\admin\models;
use modules\admin\models\config;

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
        return array_keys($this->attributeLabels());
    }

    private function saveAll()
    {
        $keys = $this->getCongfigKeys();
        foreach ($keys as $key){
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