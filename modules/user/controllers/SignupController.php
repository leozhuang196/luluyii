<?php

namespace modules\user\controllers;
use yii;
use yii\filters\AccessControl;
use modules\user\models\SignupForm;
use yii\web\Response;

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
        
        $this->performAjaxValidation($model);
        
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                Yii::$app->getSession()->setFlash('success','已经发送一封邮件到你的邮箱 '.$model->email.'，请前去完成验证');
                return $this->goHome();
                //登录操作
                /* if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                } */
            }
        }

        return $this->render('index', ['model' => $model]);
    }

    //验证邮箱时删除token
    public function actionActivateAccount($token)
    {
        $model = new SignupForm();
        if($model->removeToken($token)){
            \Yii::$app->getSession()->setFlash('success','邮件已经验证，请登录您的帐号。');
            return $this->goHome();
        }
        return $this->render('activate-account');
    }
    
    protected function performAjaxValidation($model)
    {
        //判断是否是ajax请求Yii::$app->request->isAjax
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            //设置返回的数据类型是JSON格式
            Yii::$app->response->format = Response::FORMAT_JSON;
            echo json_encode(\yii\widgets\ActiveForm::validate($model));
            //相当于die()
            Yii::$app->end();
        }
    }
}
