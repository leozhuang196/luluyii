<?php
$params = require(__DIR__ . '/params.php');
$rules = require(__DIR__.'/rules.php');
$modules = require(__DIR__.'/modules.php');
$config = [
    'language' => 'zh-CN',
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            'cookieValidationKey' => 'weixin',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'modules\user\models\User',
            //如果开启自动登录 yii\web\User::enableAutoLogin 则基于 cookie 登录（如：记住登录状态），
            //它将使用 cookie 保存用户身份，这样 只要 cookie 有效就可以恢复登录状态
            'enableAutoLogin' => true,
            //修改默认的登陆地址
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
                ],
            ],
        ],
        'i18n' => [
            'translations' => [
                'user' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@modules/user/messages',
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
            'rules' => $rules['rules'],
        ],
    ],
    'params' => $params,
     'modules' => $modules['modules'],
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