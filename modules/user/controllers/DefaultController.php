<?php
namespace modules\user\controllers;
use Yii;
use yii\helpers\Html;
use app\controllers\FrontController;
use modules\user\models\LoginForm;
use modules\user\models\SignupForm;
use yii\web\Response;
use modules\user\models\FindPasswordForm;
use modules\user\models\ResetPasswordForm;
use modules\user\models\ModifyPasswordForm;
use modules\user\models\UserInfo;
use modules\user\models\User;
use modules\user\models\SigninForm;
use modules\user\models\SendMessageForm;
use modules\user\models\UserMessage;
use modules\user\models\UserFans;

class DefaultController extends FrontController
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => 'yii\filters\AccessControl',
                'only' => ['logout','signin','activate-account','find-password','reset-password','modify-password','modify-info','modify-image','send-message',
                           'focus','nofocus','show-fans','show-fans2','show-focus','show-focus2'],
                'rules' => [
                    ['actions' => ['activate-account','find-password','reset-password'],'allow' => true,'roles'=>['?']],
                    ['actions' => ['logout','modify-password','modify-info','modify-image','signin','send-message','focus','nofocus','show-fans','show-fans2','show-focus','show-focus2'],
                                    'allow' => true,'roles'=>['@']
                    ],
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
        if(!Yii::$app->user->isGuest){
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
        if(!Yii::$app->user->isGuest){
            return $this->goHome();    
        }
        $model = new SignupForm();
        $this->performAjaxValidation($model);
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->getSession()->setFlash('success','注册成功，请检查你的邮箱 '.$model->email.'，请在1小时内完成验证'.Html::a('没收到邮件？',['find-password']));
            return $this->goHome();
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
        if($model->load(Yii::$app->request->post())){
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
        if($model->load(Yii::$app->request->post()) && $model->resetPassword()){
            Yii::$app->getSession()->setFlash('success','新的密码已经生效，请重新登录您的帐号。');
            return $this->goHome();
        }
        return $this->render('resetPassword',['model'=>$model]);
    }
    
    //知道密码的情况下修改密码
    public function actionModifyPassword()
    {
        $model = new ModifyPasswordForm();
        if ($model->load(Yii::$app->request->post()) && $model->modifyPassword()){
            Yii::$app->getSession()->setFlash('success','密码修改成功');
            return $this->refresh();
        }
        return $this->render('modifyPassword',['model'=>$model]);
    }
    
    //修改个人信息
    public function actionModifyInfo()
    {
        $model = UserInfo::findOne(['user_id' => User::getUser()->id]);
        if ($model->load(Yii::$app->request->post()) && $model->save()){
            Yii::$app->getSession()->setFlash('success','个人信息修改成功');
            return $this->refresh();
        }
        return $this->render('modifyInfo',['model'=>$model]);
    }
    
    //更换头像
    public function actionModifyImage()
    {
        $model = UserInfo::findOne(['user_id' => User::getUser()->id]);
        if ($model->load(Yii::$app->request->post())){
            if ($model->saveImage($model)){
                Yii::$app->getSession()->setFlash('success','成功更换头像');
            }else {
                Yii::$app->getSession()->setFlash('error','图片格式必须为jpg/png/jpeg，且大小不能超过2M');
            }
            return $this->refresh();
        }
        return $this->render('modifyImage',['model'=>$model]);
    }
    
    //展示有多少个用户和前十个用户的用户名
    public function actionUsers()
    {
        $count = User::find()->where(['status' => 10])->count();
        $user_info = UserInfo::find()->limit(10)->orderBy(['score'=>SORT_DESC])->all();
        /* $cache = Yii::$app->cache;
        if($cache->get('user_info') == false){
            $cacheData = UserInfo::find()->limit(10)->orderBy(['score'=>SORT_DESC])->all();
            //设置缓存的时间为1个小时
            $cache->set('user_info', $cacheData,60*60);
        }
        $user_info = $cache->get('user_info'); */
        return $this->render('users', ['count' => $count,'user_info' => $user_info]);
    }
    
    //展示用户的个人信息
    public function actionShow($username)
    {
        $user = User::findOne(['username' => $username]);
        $user_info = UserInfo::findOne(['user_id' => $user->id]);
        return $this->render('show',['user'=>$user,'user_info'=>$user_info]);
    }
    
    //展示用户的个人积分、粉丝数量、关注数量
    public function actionShowScore()
    {
        $user = User::getUser();
        $user_info = UserInfo::findOne(['user_id' => User::getUser()->id]);
        return $this->render('showScore',['user'=>$user,'user_info'=> $user_info]);
    }
    
    //展示全部粉丝列表，用在show页面
    public function actionShowFans($username)
    {
        //传递$user和$user_info是为了展示show页面
        $user = User::findOne(['username' => $username]);
        $user_info = UserInfo::findOne(['user_id' => $user->id]);
        $user_fans = UserFans::showFans($username);
        return $this->render('showFans',['user_fans'=> $user_fans,'user'=>$user,'user_info'=>$user_info]);
    }
    
    //展示全部粉丝列表，用在showScore页面，这里必须优化代码，增加代码的重复利用率
    public function actionShowFans2($username)
    {
        //传递$user和$user_info是为了展示show页面
        $user = User::findOne(['username' => $username]);
        $user_info = UserInfo::findOne(['user_id' => $user->id]);
        $user_fans = UserFans::showFans($username);
        return $this->render('showFans2',['user_fans'=> $user_fans,'user'=>$user,'user_info'=>$user_info]);
    }
    
    //展示全部关注列表
    public function actionShowFocus($username)
    {
        //传递$user和$user_info是为了展示show页面
        $user = User::findOne(['username' => $username]);
        $user_info = UserInfo::findOne(['user_id' => $user->id]);
        $user_focus = UserFans::showFocus($username);
        return $this->render('showFocus',['user_focus'=> $user_focus,'user'=>$user,'user_info'=>$user_info]);
    }
    
    //展示全部关注列表
    public function actionShowFocus2($username)
    {
        //传递$user和$user_info是为了展示show页面
        $user = User::findOne(['username' => $username]);
        $user_info = UserInfo::findOne(['user_id' => $user->id]);
        $user_focus = UserFans::showFocus($username);
        return $this->render('showFocus2',['user_focus'=> $user_focus,'user'=>$user,'user_info'=>$user_info]);
    }
    
    //签到
    public function actionSignin()
    {
        SigninForm::signin();
        return $this->goHome();
    }
    
    //今日签到会员
    public function actionSigninMember()
    {
        $model = new SigninForm();
        $member = $model->siginMembers();
        return $this->render('signinMember',['member'=>$member]);
    }
    
    //发送私信
    public function actionSendMessage($username='')
    {
        $model = new SendMessageForm();
        if ($model->load(Yii::$app->request->post()) && $model->sendMessage()){
            Yii::$app->getSession()->setFlash('success','私信发送成功');
            return $this->refresh();
        }
        return $this->render('sendMessage',['model'=>$model,'username'=>$username]);
    }
    
    //邮件提醒
    public function actionNoticeMessage()
    {
        $message = UserMessage::findAll(['to' => User::getUser()->username]);
        return $this->render('noticeMessage',['message'=>$message]);
    }
    
    //已发送邮件
    public function actionHasSendMessage()
    {
        $message = UserMessage::findAll(['from' => User::getUser()->username]);
        return $this->render('hasSendMessage',['message'=>$message]);
    }
    
    //关注
    public function actionFocus($focus_who)
    {
        $user_fans = new UserFans();
        if($user_fans->focus($focus_who)){
            return $this->redirect(['show','username'=>$focus_who]);
        }
    }
    
    //取消关注
    public function actionNoFocus($nofocus_who)
    {
        $user_fans = UserFans::exitFocus($nofocus_who);
        if($user_fans->nofocus($user_fans)){
            return $this->redirect(['show','username'=>$nofocus_who]);
        }
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