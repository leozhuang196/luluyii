<?php
namespace modules\admin\models;
use modules\admin\models\BaseConfig;

class ThemeConfig extends BaseConfig
{
    public $sys_site_theme;

    public static function tableName()
    {
        return '{{%config}}';
    }

    public function rules()
    {
        return [
            [['sys_site_theme'], 'required'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'sys_site_theme' => '网站主题',
        ];
    }
}