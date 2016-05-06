<?php
namespace app\controllers;
use Yii;
use yii\web\Controller;
use app\models\ContactForm;

class SiteController extends Controller
{
   public function init()
   {
       parent::init();
       $this->layout='@themes/basic/layouts/main.php';
   }
        
    public function actions()
    {
        return [
            //因为你在components组件中配置了报错信息页面是site/error，所以这里需要写'error'
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'height' => 50,
                'width' => 80,
                'maxLength' =>5,
                'minLength' =>4,
                'testLimit'=>5,
                //fixedVerifyCode通常用在自动化测试 方便复制验证码的场景下使用
                //每次都固定显示一个验证码，方便测试，方便开发
                //'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
                
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');
            return $this->refresh();
        }
        return $this->render('contact', ['model' => $model]);
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionDiary()
    {
        return $this->render('diary');
    }
}