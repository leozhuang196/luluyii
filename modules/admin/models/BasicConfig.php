<?php
namespace modules\admin\models;
use modules\admin\models\BaseConfig;

class BasicConfig extends BaseConfig
{
    public $sys_site_name;
    public $sys_site_description;

    public static function tableName()
    {
        return '{{%config}}';
    }

    public function rules()
    {
        return [
            [['sys_site_name', 'sys_site_description'], 'required'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'sys_site_name' => '网站名称',
            'sys_site_description' => '网站描述',
        ];
    }
}