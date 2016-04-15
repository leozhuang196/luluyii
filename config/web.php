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
            //如果开启自动登录 yii\web\User::enableAutoLogin 则基于 cookie 登录（如：记住登录状态），
            //它将使用 cookie 保存用户身份，这样 只要 cookie 有效就可以恢复登录状态
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
        'view' => [
            //指定主题后，就会后相应的主题文件夹下面找相应的view。因为可以指定多个主题，所以主题的配置顺序是从上往下的。
            //在当前的主题文件夹下面找不到相应的view的时候 就会去第二个主题文件夹里面找。
            'theme' => [
                //pathMap设置替换映射关系
                'pathMap' => ['@app/views'=>'@app/themes/basic'],
                //baseUrl设置要访问的资源的url（结尾不加“/”）
                //basePath设置资源所在的文件目录
            ],
        ],
        'i18n' => [
            'translations' => [
                'user' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/modules/user/messages',
                ],
            ],
        ],



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
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],



        'urlManager' => [
            //用于URL路径化
            'enablePrettyUrl' => true,
            'suffix'=>'.html',
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
