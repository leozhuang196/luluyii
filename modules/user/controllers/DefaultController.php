<?php
namespace modules\user\controllers;
use Yii;
use yii\web\Controller;
use modules\user\models\LoginForm;
use modules\user\models\SignupForm;
use yii\web\Response;
use modules\user\models\FindPasswordForm;
use modules\user\models\ResetPasswordForm;
use modules\user\models\ModifyPasswordForm;
use modules\user\models\UserInfo;
use modules\user\models\User;

class DefaultController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => 'yii\filters\AccessControl',
                'only' => ['logout', 'signup','signin', 'activate-account','find-password','reset-password','logout','modify-password','modify-info'],
                'rules' => [
                    ['actions' => ['login','signup','activate-account','find-password','reset-password'],'allow' => true,'roles'=>['?']],
                    ['actions' => ['logout','modify-password','modify-info','signin'],'allow' => true,'roles'=>['@']],
                ],
            ],
            'verbs' => [
                'class' => 'yii\filters\VerbFilter',
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }
    
    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new LoginForm();
        if ($model->load(Yii::$app->getRequest()->post()) && $model->login()) {
            return $this->goHome();
        }
        return $this->render('login', ['model' => $model]);
    }
    
    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }
    
    public function actionSignup()
    {
        $model = new SignupForm();
        $this->performAjaxValidation($model);
        if ($model->load(Yii::$app->request->post())) {
            if ($model->signup()) {
                Yii::$app->getSession()->setFlash('success','已经发送一封邮件到你的邮箱 '.$model->email.'，请在1小时内完成验证');
                return $this->goHome();
            }
        }
        return $this->render('signup', ['model' => $model]);
    }
    
    //注册的时候通过点击邮件链接激活账号
    public function actionActivateAccount($token)
    {
        $model = new SignupForm();
        if($model->removeToken($token)){
            Yii::$app->getSession()->setFlash('success','邮件已经验证，请登录您的帐号');
            return $this->goHome();
        }else{
            Yii::$app->getSession()->setFlash('error','激活账号的令牌已经失效，请重新发送邮件激活您的账号');
            return $this->redirect('find-password');
        }
    }
    
    //忘记密码的时候通过发送邮件找回密码
    public function actionFindPassword()
    {
        $model = new FindPasswordForm();
        if($model->load(Yii::$app->request->post()) && $model->validate()){
            if($model->sendEmail()){
                Yii::$app->getSession()->setFlash('success', '邮件发送成功！请检查您的电子邮箱获得进一步操作说明。');
                return $this->goHome();
            }else{
                Yii::$app->getSession()->setFlash('error','抱歉，我们无法对提供的邮箱发送邮件');
            }
        }
        return $this->render('findPassword',['model'=>$model]);
    }
    
    //点击邮箱的链接跳转到新页面进行重置密码
    public function actionResetPassword($token)
    {
        $model = new ResetPasswordForm($token);
        if($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()){
            Yii::$app->getSession()->setFlash('success','新的密码已经生效，请重新登录您的帐号。');
            return $this->goHome();
        }
        return $this->render('resetPassword',['model'=>$model]);
    }
    
    //知道密码的情况下修改密码
    public function actionModifyPassword()
    {
        $model = new ModifyPasswordForm();
        if ($model->load(\Yii::$app->request->post())){
            if($model->modifyPassword()){
                Yii::$app->getSession()->setFlash('success','密码修改成功');
                return $this->refresh();
            }
        }
        return $this->render('modifyPassword',['model'=>$model]);
    }
    
    //修改个人信息
    public function actionModifyInfo()
    {
        $model = UserInfo::findOne(['user_id' => Yii::$app->user->id]);
        if ($model->load(Yii::$app->request->post()) && $model->saveImage($model) && $model->save()){
            Yii::$app->getSession()->setFlash('success','个人信息修改成功');
            return $this->refresh();
        }
        return $this->render('ModifyInfo',['model'=>$model]);
    }
    
    //展示有多少个用户和前十个用户的用户名
    public function actionUsers()
    {
        $count = User::find()->where(['status' => 10])->count();
        $model = User::find()->where(['status' => 10])->limit(10)->all();
        return $this->render('users', ['count' => $count,'model' => $model]);
    }
    
    //展示用户的个人信息
    public function actionShow($user_id)
    {
        $user = User::findOne(['id' => $user_id]);
        $user_info = UserInfo::findOne(['user_id' => $user_id]);
        return $this->render('show',['user'=>$user,'user_info'=>$user_info]);
    }
    
    //签到，未实现
    public function actionSignin()
    {
        $model = UserInfo::findOne(['user_id' => Yii::$app->user->id]);
        if (!$model->signin_time){
            if ($model->load(Yii::$app->request->post())){
                $model->score ++;
                $model->save();
                Yii::$app->getSession()->setFlash('success','签到成功');
                return $this->refresh();
            }
        }else if($model->signin_time < mktime(0,0,0,date('m'),date('d'),date('Y'))){
            $model->signin_time = NUll;
            die('您已签到');
        }
        return $this->render('signin',['model'=>$model]);
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