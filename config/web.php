<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'language' => 'zh-CN',
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'weixin',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\modules\user\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@mail',
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
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        'urlManager' => [
            //用于URL路径化
            'enablePrettyUrl' => true,
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
        ],
    ],
    'params' => $params,
     'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\AdminModule',
            'modules' => [
                'rbac' => [
                    'class' => 'app\modules\admin\modules\rbac\RbacModule',
                ],
            ],
        ],
        'user' => [
            'class' => 'app\modules\user\UserModule',
        ],
    ],
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
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
