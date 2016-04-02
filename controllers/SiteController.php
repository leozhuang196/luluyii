<?php
namespace app\controllers;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\ContactForm;

class SiteController extends Controller
{
    //存取控制过滤器（ACF）是一种通过 yii\filters\AccessControl 类来实现的简单授权方法， 非常适用于仅需要简单的存取控制的应用
    //ACF 是一个种行动（action）过滤器 filter，可在控制器或者模块中使用
    //当一个用户请求一个 action 时， ACF会检查 yii\filters\AccessControl::rules 列表，判断该用户是否允许执 行所请求的action
    public function behaviors()
    {
        return [
            'access' => [
                //AccessControl提供基于yii\filters\AccessControl::rules规则的访问控制。
                //特别是在动作执行之前，访问控制会检测所有规则并找到第一个符合上下文的变量（比如用户IP地址、登录状态等等）的规则
                //来决定允许还是拒绝请求动作的执行，如果没有规则符合，访问就会被拒绝。

                //ACF 自顶向下逐一检查存取规则，直到找到一个与当前 欲执行的操作相符的规则。 然后该匹配规则中的 allow 选项的值用于判定该用户是否获得授权。
                //如果没有找到匹配的规则， 意味着该用户没有获得授权

             /*    当 ACF 判定一个用户没有获得执行当前操作的授权时，它的默认处理是：
                如果该用户是访客，将调用 yii\web\User::loginRequired() 将用户的浏览器重定向到登录页面。
                如果该用户是已认证用户，将抛出一个 yii\web\ForbiddenHttpException 异常。
                你可以通过配置 yii\filters\AccessControl::denyCallback 属性定制该行为：*/

                'class' => AccessControl::className(),
                //only 选项指明 ACF 应当只 对 login， logout 和 signup 方法起作用
                'only' => ['login', 'logout', 'signup'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['login', 'signup'],
                        'roles' => ['?'],
                    ],
                    // 允许认证用户
                    [
                        'allow' => true,
                        'actions' => ['logout'],
                        //@ 是一个特殊标识， 代表”已认证用户”。
                        //? 是另一个特殊的标识，代表”访客用户”
                        'roles' => ['@'],
                    ],
                ],
            ],
            //指定该规则用于匹配哪种请求方法（例如GET，POST）。 这里的匹配大小写不敏感
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
        return $this->render('index');
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

        //$this->layout = '@app/views/layouts/columns_3.php';
        //return $this->render('about');

        return $this->render('about');
    }

    public function actionDiary()
    {
        return $this->render('diary');
    }
}