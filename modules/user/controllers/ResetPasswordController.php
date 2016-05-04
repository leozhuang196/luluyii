<?php
namespace modules\user\controllers;
use modules\user\models\ResetPasswordForm;

class ResetPasswordController extends \yii\web\Controller
{
    public function actionIndex($token)
    {
        $model = new ResetPasswordForm($token);
        if($model->load(\Yii::$app->request->post()) && $model->validate() && $model->resetPassword()){

            \Yii::$app->getSession()->setFlash('success','新的密码已经生效，请重新登录您的帐号。');
            return $this->goHome();
        }
        return $this->render('index',['model'=>$model]);
    }

}
