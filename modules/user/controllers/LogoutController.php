<?php

namespace app\modules\user\controllers;
use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

class LogoutController extends \yii\web\Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

}
