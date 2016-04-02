<?php

namespace app\modules\admin\modules\rbac\controllers;

use Yii;
use yii\web\Controller;

class ItemController extends Controller
{
    public $authManager;
    public function init() {
        $this->authManager=\Yii::$app->authManager;
    }
}
