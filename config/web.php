<?php
$config = [
    'language' => 'zh-CN',
    //默认控制器
    //'defaultRoute' => 'post',
    //项目时区
    'timeZone' => 'PRC',
    'id' => 'basic',
    //项目的根目录
    'basePath' => dirname(__DIR__),
    //将所有的request请求交给offline控制器处理，当我们的项目需要维护的时候，
    //将所有的请求都交友Offline控制器处理，抛出项目维护的公告
    /*'catchAll'=>[
        'offline',
        //param1和param2是offline可以接收到的参数
        'param1'=>'升级',
        'param2'=>'维护',
    ],*/
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            'cookieValidationKey' => 'weixin',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
            'cachePath' => '@runtime/cache',
        ],
        'user' => [
            'identityClass' => 'modules\user\models\User',
            //如果开启自动登录 yii\web\User::enableAutoLogin 则基于 cookie 登录（如：记住登录状态），
            //它将使用 cookie 保存用户身份，这样 只要 cookie 有效就可以恢复登录状态
            'enableAutoLogin' => true,
            //修改默认的登录地址
            'loginUrl' => ['user/default/login'],
        ],
        'errorHandler' => [
            //配置网站错误信息显示的页面
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
        'view' => [
            //指定主题后，就会后相应的主题文件夹下面找相应的view。因为可以指定多个主题，所以主题的配置顺序是从上往下的。
            //在当前的主题文件夹下面找不到相应的view的时候 就会去第二个主题文件夹里面找。
            'theme' => [
                'pathMap' => [
                    '@app/views'=>'@themes/basic',
                    '@modules/user/views'=>'@themes/modules/user',
                    '@modules/post/views'=>'@themes/modules/post',
                    '@modules/shop/views'=>'@themes/modules/shop',
                ],
            ],
        ],
        'i18n' => [
            'translations' => [
                'common' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                ],
                'user' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@modules/user/messages',
                ],
                'post' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@modules/post/messages',
                ],
                'shop' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@modules/shop/messages',
                ],
            ],
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        'urlManager' => [
            //用于URL路径化
            'enablePrettyUrl' => true,
            //'suffix'=>'.html',
            //指定是否在URL在保留入口脚本 index.php,同时还要在index.php同级目录下新建.htaccess文件
            'showScriptName' => false,
            'rules' => require(__DIR__.'/rules.php'),
        ],
    ],
    'params' => require(__DIR__ . '/params.php'),
    'modules' => require(__DIR__.'/modules.php'),
];
if (YII_ENV_DEV) {
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}
return $config;