<?php
namespace app\modules\user\controllers;
use app\modules\user\models\ModifyPasswordForm;
use yii;

class ModifyPasswordController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $model = new ModifyPasswordForm();
        if ($model->load(\Yii::$app->request->post())){
            if($model->modifyPassword()){
                \Yii::$app->getSession()->setFlash('success','密码修改成功');
                //这个是刷新页面，如果成功保存，就刷新页面，这样就可以达到防止重复提交的作用。
                return $this->refresh();
            }
        }
        return $this->render('index',['model'=>$model]);
    }

}