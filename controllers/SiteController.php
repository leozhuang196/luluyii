<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\SignupForm;
use app\models\Content;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                //AccessControl提供基于yii\filters\AccessControl::rules规则的访问控制。
                //特别是在动作执行之前，访问控制会检测所有规则并找到第一个符合上下文的变量（比如用户IP地址、登录状态等等）的规则
                //来决定允许还是拒绝请求动作的执行，如果没有规则符合，访问就会被拒绝。

                'class' => AccessControl::className(),
                'only' => ['logout'],

                //存取控制过滤器（ACF）是一种通过 yii\filters\AccessControl 类来实现的简单授权方法
                //当一个用户请求一个 action 时， ACF会检查 yii\filters\AccessControl::rules 列表，
                //判断该用户是否允许执 行所请求的action
                'rules' => [
                    // 允许认证用户
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        //@ 是一个特殊标识， 代表”已认证用户”。
                        //? 是另一个特殊的标识，代表”访客用户”
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    //Yii Controller 中的actions具体有什么作用:可以让controller共用相同的方法，比如：
//siteController和publicController里面都有actionUpdate方法并且功能一致，那么就可以用actions
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
            'static' => [
                'class' => '\yii\web\ViewAction',
            ],
        ];
    }

    public function actionIndex()
    {
        $posts = Content::findAll();
        return $this->render('index',['posts'=>$posts]);
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public $testData='my data';

    public function actionAbout()
    {
        //$this->layout ='mylayout';

        //设置View::params属性的值
        //\Yii::$app->view->params=['testData'=>'hello'];

        $this->layout = '@app/views/layouts/columns_3.php';
        return $this->render('about');

        //return $this->render('about',['testData'=>'hello']);
    }
}






































