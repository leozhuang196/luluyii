<?php
namespace app\controllers;
use Yii;
use app\models\Test;
use yii\web\Controller;

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
}