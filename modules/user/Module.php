<?php
namespace modules\user;
class Module extends \yii\base\Module
{
    public $controllerNamespace = 'modules\user\controllers';
    public function init()
    {
        parent::init();
        $this->layout = '@themes/basic/layouts/main.php';
    }
}