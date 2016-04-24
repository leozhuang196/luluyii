<?php

namespace app\modules\user\controllers;
use Yii;
use yii\filters\AccessControl;
use app\modules\user\models\LoginForm;
use yii\web\Response;

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
        
        $this->performAjaxValidation($model);
        
        //获取用户输入的username和password，然后进行验证
        if ($model->load(Yii::$app->getRequest()->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('index', ['model' => $model,]);
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
