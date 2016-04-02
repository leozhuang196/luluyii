<?php

namespace app\models\config;

use Yii;
use app\models\config\BaseConfig;

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

   /*  public function themeSave() {
        Config::updateAll(['value'=>$this->sys_site_theme],['`key`'=>'sys_site_theme']);
    } */
}
