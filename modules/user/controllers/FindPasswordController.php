<?php
namespace modules\user\controllers;
use modules\user\models\FindPasswordForm;
use yii;

class FindPasswordController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $model = new FindPasswordForm();
        if($model->load(\Yii::$app->request->post()) && $model->validate()){
            if($model->sendEmail()){
                Yii::$app->getSession()->setFlash('success', '邮件发送成功！请检查您的电子邮箱获得进一步操作说明。');
                return $this->goHome();
            }else{
                Yii::$app->getSession()->setFlash('error','抱歉，我们无法对提供的邮箱发送邮件');
            }
        }
        return $this->render('index',['model'=>$model]);
    }

}
