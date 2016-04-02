<?php

namespace app\modules\user\controllers;
use Yii;
use yii\filters\AccessControl;
use app\modules\user\models\LoginForm;

class LoginController extends \yii\web\Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['?'],
                    ]
                ]
            ]
        ];
    }

    public function actionIndex()
    {
        //判断当前是否游客
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        //获取用户输入的username和password，然后进行验证
        if ($model->load(Yii::$app->getRequest()->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('index', ['model' => $model,]);
    }

}
