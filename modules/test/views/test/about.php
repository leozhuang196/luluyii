<?php
use modules\admin\models\Config;
$this->title = '关于我们';

/* $this->registerMetaTag(['name'=>'author','content'=>'discuss'],'sasdsa'); //添加<meta>标签
$this->registerMetaTag(['name'=>'author1','content'=>'discuss'],'sasdsa'); //添加<meta>标签
$this->registerLinkTag(['rel'=>'arce','title'=>'yii2','href'=>'www.yii.com']); //添加<link>标签

$this->registerCss('body{margin:0px;padding:0px;}'); //注册css代码
$this->registerCssFile($url); //注册css文件

$this->registerJs('alert(4)'); //注册js代码

//depends保证加载JS文件的先后顺序 asset bundles资源包
//此时先加载yii\web\YiiAsset，再加载assets/e05e437e/yii.js
$this->registerJsFile('assets/e05e437e/yii.js',
    ['depends'=>'yii\web\YiiAsset','position'=>\yii\web\View::POS_HEAD]); //注册js文件

//由于about是siteController指定显示的方法，所以about的上文是siteController
//此时View::context获取到的是siteController中所有的属性和方法
$context=$this->context;
echo $context->testData;
echo $context->actionIndex(); */
?>

<div class="site-about">

    <!-- 访问View::params的值 -->
    <?php //echo $this->params['testData'];?>

    <?php //echo $testData;?>

    <h3><?php echo Config::findOne(['`key`'=>'sys_site_description'])->value?></h3>
</div>