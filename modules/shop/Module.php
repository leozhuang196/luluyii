<?php
namespace modules\shop;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'modules\shop\controllers';

    public function init()
    {
        parent::init();
        $this->layout = '@themes/basic/layouts/back_main.php';
    }
}
