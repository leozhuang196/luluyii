<?php

namespace app\modules\user\controllers;
use Yii;
use yii\filters\AccessControl;
use app\modules\user\models\SignupForm;

class SignupController extends \yii\web\Controller
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

    public function actions()
    {
        return [
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'height' => 50,
                'width' => 80,
                'maxLength' =>4,
                'minLength' =>4,
                'testLimit'=>5, //验证码允许验证的次数
            ],
        ];
    }

    public function actionIndex()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                //登录操作
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('index', [
            'model' => $model,
        ]);
    }
}
