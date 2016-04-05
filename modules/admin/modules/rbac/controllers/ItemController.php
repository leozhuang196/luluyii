<?php

namespace app\modules\admin\modules\rbac\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;

class ItemController extends Controller
{
    public $authManager;
    
    public function init() {
        $this->authManager=\Yii::$app->authManager;
    }
    
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }
}
