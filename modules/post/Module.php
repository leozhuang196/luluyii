<?php
namespace modules\post;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'modules\post\controllers';

    public function init()
    {
        parent::init();
        $this->layout = '@themes/basic/layouts/back_main.php';
    }
}
