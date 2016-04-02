<?php
//部署到生产环境时，注释掉下面两行
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

//注册 Composer 自动加载器
require(__DIR__ . '/../vendor/autoload.php');
//包含 Yii 类文件
require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');

//加载应该配置
$config = require(__DIR__ . '/../config/web.php');

//创建、配置、运行一个应用
(new yii\web\Application($config))->run();
