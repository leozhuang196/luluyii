<?php
namespace modules\admin;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'modules\admin\controllers';

    public function init()
    {
        parent::init();
        $this->layout = '@themes/modules/layouts/main.php';
    }
}