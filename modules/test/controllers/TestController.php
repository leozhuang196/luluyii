<?php
namespace modules\test\controllers;
use Yii;
use app\models\Test;
use yii\web\Controller;
use app\models\Customer;
use app\models\Order;
use yii\web\UploadedFile;

class TestController extends Controller
{
    public function actionIndex(){
        $test = new Test();
//2.2、属性的访问
        $test->username = 'lulubin';
        echo $test->username;
      //由于模型实现了ArrayAccess接口，所以也可以用数组的方式来访问：
        echo $test['username'];

//2.3、属性批量读取和赋值
        //如果要一次获取模型的所有的属性，可用通过 attributes 属性来得到
        $test->username = 'lulubin';
        $test->password = '123456';
        var_dump($test->attributes);
        //同理，也可以用attributes来进行批量赋值
        $test->attributes=[
                'username' => 'lulubin',
                'password' => '123456',
        ];
        var_dump($test->attributes);
    }

//3.4、如果要给模型指定所使用的场景可以用下面的的几个方法
    public function actionCreate($id = null)
    {
        // 第一种方法
        $employee = new Test(['scenario' => 'managementPanel']);

        // 第二种
        $employee = new Test();
        $employee->scenario = 'managementPanel';

        // 第三种
        $employee = Test::find()->where('id = :id', [':id' => $id])->one();
        if ($employee !== null) {
            $employee->scenario = 'managementPanel';
        }
    }
    //上面的三种方面都是给Test模型指定使用'managementPanel场景。
    //一般来说在表单模型中基本不需要指定场景，因为一个模型对应着一个表单
    //而默认的场景是返回这个模型里面所有的属性的，而且在对属性的批量赋值方面都是安全的。

    //过滤器
    /* public function behaviors() {
        return [
            'test' => [
                'class' => 'yii\filters\TestFilter'//调用过滤器
            ]
        ];
    }
    public function actionFilter() {
        return '当前action显示<br/>';//返回的内容会递交给过滤器，由afterAction进行处理
    } */

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
    //验证码
    public function actions()
    {
        return [
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
            ],
        ];
    }
    public function actionTest()
    {
        $model = new \app\models\Test();
        return $this->render('test', [
            'model' => $model,
        ]);
    }

    //邮件发送
    public function actionMail()
    {
        $mail = \Yii::$app->mailer->compose()
            ->setFrom(['452936616@qq.com' => '马浩槟'])
            ->setTo('1363236681@qq.com')
            ->setSubject('邮件发送配置')
            ->setTextBody('马浩槟发送过来')   //发布纯文字文本
            ->setHtmlBody("<h1>我是h1标签</h1>")    //发布可以带html标签的文本
            ->send();
        if($mail){
            echo '发送成功';
        }else{
            echo '发送失败';
        }
    }

    //return a>=b
    function actionAb()
    {
        $a = 1;
        $b = time();
        var_dump($a>=$b);
    }

    function actionParams()
    {
        //var_dump(yii::$app->params['smtpHost']);
        //echo Yii::getVersion();
        echo time();
    }

    function actionOrder()
    {
    /******************************* 关联查询 ****************************/
        /********** 1、根据顾客名字查询顾客订单，顾客1:n订单 ******/
        //查询zhangsan的订单
        $customer = Customer::find()->where(['name' => 'zhangsan'])->one();
        $order = $customer->getOrder();
        print_r($order);

        /********** 2、根据订单查询顾客名字，订单1:1顾客 *********/
        //查询1号订单的顾客资料
        $order = Order::find()->where(['order_id' => 1])->one();
        $customer = $order->getCustomer();
        print_r($customer);

       /**** $customer = $orders->customer;
        * 3、当访问不存在的属性时$orders->customer，php会自动调用__get()
        * 即$orders->customer相当于调用$orders->getCustomer()
        * 同时还会在末尾自动补上one()方法，即$orders->getCustomer()->one()
        * 因此，当你使用$orders->customer时，要在getCustomer()方法末尾要去掉one() *****/

        /********************* 关联查询问题1：关联查询结果会被缓存 **********************/
     /* 当你执行 $order=Order::find()->where(['order_id' => 1])->one() 时，往数据表进行了查询
      * 第二次执行 $order=Order::find()->where(['order_id' => 1])->one() 时则不会从数据表中进行查询，会直接从缓存中读取
      * 所以当你更新数据表的时候，你查询到的结果却没有更新，此时你需要先unset($order)删除缓存再从数据表中查询 */

        /********************* 关联查询问题2：关联查询的多次查询 **********************/
        $customers=Customer::find()->all(); //1次sql语句select * from customer
        foreach($customers as $customer){
            //如果Customer表中有100条记录，则会执行100次sql语句select * from order where customer_id=...
            print_r($customer->order);
        }
        /*解决方法：加上with('order')
         * select * from customer，select * from order where customer_id in(...),这时的...表示所有顾客customer_id的集合
         * 选取所有顾客的customer_id塞到各自的order属性，执行下面foreach时不会再有sql语句，这里只执行了2次sql语句*/
        /*$customers=Customer::find()->with('order')->all();
        foreach($customers as $customer){
            print_r($customer->order);
        }*/
    }
    
    public function actionUpload()
    {
        $model = new Test();
        if(\Yii::$app->request->isPost){
            $model->file = UploadedFile::getInstance($model, 'file');
            
            if ($model->file && $model->validators) {
                $model->file->saveAs('images/' . $model->file->baseName . '.' . $model->file->extension);
            }
        }
        return $this->render('test', ['model' => $model]);
    }
    
    public function actionManager()
    {
        $auth = Yii::$app->authManager;
        // 添加 "createPost" 权限
        $createPost = $auth->createPermission('createPost');
        $createPost->description = 'Create a post';
        $auth->add($createPost);
        
        // 添加 "updatePost" 权限
        $updatePost = $auth->createPermission('updatePost');
        $updatePost->description = 'Update post';
        $auth->add($updatePost);
                
        // 添加 "author" 角色并赋予 "createPost" 权限
        $author = $auth->createRole('author');        
        $auth->add($author);        
        $auth->addChild($author, $createPost); 
               
        // 添加 "admin" 角色并赋予 "updatePost" 和 "author" 权限
        $admin = $auth->createRole('admin');        
        $auth->add($admin);        
        $auth->addChild($admin, $updatePost);        
        $auth->addChild($admin, $author);
                
        // 为用户指派角色。其中 1 和 2 是由 IdentityInterface::getId() 返回的id （译者注：user表的id）
        // 通常在你的 User 模型中实现这个函数。
        $auth->assign($author, 6);        
        $auth->assign($admin, 5);
    }
    
    public function actionResponse()
    {
        //设置返回的是JSON数据类型
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $items = ['some', 'array', 'of', 'data' => ['associative', 'array']];
        return $items;
    }
    
    //public $testData='my data';
    public function actionAbout()
    {
        //设置View::params属性的值
        //\Yii::$app->view->params=['testData'=>'hello'];
    
        return $this->render('about');
    }
    
    //通过 yii\rbac\ManagerInterface application component 提供 RBAC 功能。
    //使用 RBAC 涉及到两部分工作。第一部分是建立授权数据， 而第二部分是使用这些授权数据在需要的地方执行检查
    
    //用户——角色Role(管理员)——权限Permission(删除文章)
    //角色是 权限 的集合 （例如：建贴、改贴）。一个角色 可以指派给一个或者多个用户。
    //要检查某用户是否有一个特定的权限， 系统会检查该包含该权限的角色是否指派给了该用户。
    
    //可以用一个规则 rule 与一个角色或者权限关联
    //一个规则用一段代码代表， 规则的执行是在检查一个用户是否满足这个角色或者权限时进行的。
    //例如，"改帖" 的权限 可以使用一个检查该用户是否是帖子的创建者的规则。
    //权限检查中，如果该用户 不是帖子创建者，那么他（她）将被认为不具有 "改帖"的权限。
    
    //角色和权限都可以按层次组织。特定情况下，一个角色可能由其他角色或权限构成， 而权限又由其他的权限构成。
    //角色在上方，权限在下方，从上到下如果碰到权限那么再往下不能出现角色
    
    // Yii 提供了两套授权管理器： yii\rbac\PhpManager 使用 PHP 脚本存放授权数据和 yii\rbac\DbManager使用数据库存放授权数据
    //你可以使用存放在 @yii/rbac/migrations 目录中的数据库迁移文件创建数据表
    
    
    /* 'urlManager' => [
        //用于URL路径化
        'enablePrettyUrl' => true,
        //'suffix'=>'.html',
        //指定是否在URL在保留入口脚本 index.php
        'showScriptName' => false,
        //同时还要在index.php同级目录下新建.htaccess文件
    /* #表示重写引擎开
     RewriteEngine on
    #请求的文件或路径是不存在的，如果文件或路径存在将返回已经存在的文件或路径
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule . index.php */
    
    /*#概述来说，htaccess文件是Apache服务器中的一个配置文件，它负责相关目录下的网页配置。
     #通过htaccess文件，可以帮我们实现：网页301重定向、自定义404错误页面、改变文件扩展名、
    允许/阻止特定的用户或者目录的访问、禁止目录列表、配置默认文档等功能。
    */ 
}