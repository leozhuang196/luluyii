<?php

/***************************************2、部件（Widget）********************************************/
//部件是视图中的独立的区块，用来把一些复杂的逻辑、页面显示及相应的功能实到一个独立的组件中。
//Yii内置很多常用的部件，如表单（active form），面包屑（breadcrumbs），菜单（menu）以及对bootstrap的包装。另外在某些扩展组件中也提供了部件，如官方的jQueryUI组件。

//输出部件Menu中的内容
echo \yii\widgets\Menu::widget(['items' => $items]);

//可往部件中传递参数来初始化部件
$form = \yii\widgets\ActiveForm::begin([
    'options' => ['class' => 'form-horizontal'],
    'fieldConfig' => ['inputOptions' => ['class' => 'input-xlarge']],
]);
//... form inputs here ...
\yii\widgets\ActiveForm::end();
?>


<?php
/******************************************************3、安全************************************************************/
//最主要的安全规则之一就是对所有的输出进行编码，如果违反这一规则将会导致脚本执行漏洞，最大可能会导致XSS跨域站点攻击以到管理员密码。

//Yii提供了一系列的工具来帮助你实现对输出的编码。最基本的过滤标签的代码如下：
use yii\helpers\Html;
?>
<div class="username">
    <?= Html::encode($user->name) ?>
</div>

<!-- 但如果想渲染视图的时候就会有点麻烦，所以我们提供了另外一个类来完成这项任务yii\helpers\HtmlPurifier: -->
<div class="post">
    <?= HtmlPurifier::process($post->text) ?>
</div>
<!-- 在HTMLPurifier 内部已经把所有的安全都考虑好了，所以输出的结果是完全安全的，然而它的执行效率却不高，所以应该考虑使用缓存（caching result）. -->


<!-- ******************************************************4、模板引擎************************************************************ -->
<?php //我们还提供了2个官方的模板引擎Smarty和Twig，想了解更多情况可以查看这里使用模板引擎（Using template engines ） ?>


<!-- ******************************************************5、在模板中使用视图对象************************************************************ -->
<?php //yii\web\View组件的对象可以在模板里面直接使用，即模板视图中的$this变量。有了这个变量可以进行更多的操作，如设置页面的标题、meta信息、脚本和访问当前的上下文对象。?>
<?php
//5.1、设置页面标题
$this->title = 'My page title';

//5.2、添加meta标签：如encoding、keywords、description等
$this->registerMetaTag(['encoding' => 'utf-8']);
//上面的参数中的数组为<meta>标签中对应的名称和值。生成如下Html代码
//<meta encoding="utf-8">
//有时候某种类型的标签只需要一个，这个时候就需要第二个参数。
$this->registerMetaTag(['name' => 'description', 'content' => 'This is my cool website made with Yii!'], 'meta-description');
$this->registerMetaTag(['name' => 'description', 'content' => 'This website is about funny raccoons.'], 'meta-description');
//如果对同一个类型（这个例子里面为meta-description）的registerMetaTag调用多次，后面的值将会覆盖前面的值，最终只有最后的一个标签会渲染出来。
//<meta name="description" content="This website is about funny raccoons.">

//5.3、注册连接标签
//<link>标签在很多情况下都很有用，如自定义favicon、RSS等等
$this->registerLinkTag([
    'title' => 'Lives News for Yii Framework',
    'rel' => 'alternate',
    'type' => 'application/rss+xml',
    'href' => 'http://www.yiiframework.com/rss.xml/',
]);
//输出Html如下
//<link title="Lives News for Yii Framework" rel="alternate" type="application/rss+xml" href="http://www.yiiframework.com/rss.xml/" />
//和meta标签一样，也可以指定第二个类型参数，从而只生成一个<link>标签。

//5.4、注册CSS
//还可以用视图对象中的registerCss()或registerCssFile()来注册CSS。registerCss()方法用来注册CSS代码段，registerCssFile()用来注册一个外部CSS文件。
$this->registerCss("body { background: #f00; }");
//上面的代码将会在头部添加如下代码
/* <style>
body { background: #f00; }
</style> */
//如果想设置style的一些额外的属性，可以给第三个参数传递name-value数组。如果想和上面一样只显示一条style标签，可以象上面那样设置第四个参数。
$this->registerCssFile("http://example.com/css/themes/black-and-white.css", [BootstrapAsset::className()], ['media' => 'print'], 'css-print-theme');
/* 上面的代码将添加一个css文件到页面的头部中。
第一个参数指定要添加的css文件
第二个参数指定这个css文件依赖的BootstrapAsset。意思是说在BootstrapAsset里面的css文件加载完成之后才加载刚才指定的css文件。如果没有指定依赖项那么这个css文件和BootstrapAsset里面的css文件的将没有先后顺序。
第三个参数设置<link>标签的其它属性的值。
最后一个参数用来唯一标识这个css文件。如果没有指定的话将会用这个css的URL连接。 */
//在注册外部css文件的时候，我们推荐你使用asset bundles 而不是使用registerCssFile()。使用asset bundles的话可以合并和压缩多个css文件，以减少网络流量的传输。

//5.5、注册脚本
//利用yii\web\View 还可以注册脚本文件。注册脚本也有2个方法，registerJs()用来注册内部js代码，registerJsFile()用来注册外部Js文件。内部js代码可用于配置或者动态生成代码的时候，
$this->registerJs("var options = ".json_encode($options).";", View::POS_END, 'my-options');
//第一个参数是我们要添加到页面的js代码，第二个参数指定js脚本添加到页面的位置。
/* View::POS_HEAD 在头部添加
View::POS_BEGIN 在[color=Red]<body>[/color]标签开始之后
View::POS_END 在[color=Red]</body>[/color]标签结束之前
View::POS_READY 在document [color=Red]ready[/color] event 准备好之后，这个会自动注册并使用jQuery。
View::POS_LOAD  在 document [color=Red]load[/color] event 准备好之后， 这个会自动注册并使用jQuery。 */
//最后的一个参数是js代码的唯一标识，如果注册有相同的唯一标识的js则后面的会替换前面的js代码。如果没有设置标识，js代码本身将被作为这个id.
//外部Js代码添加如下
$this->registerJsFile('http://example.com/js/main.js', [JqueryAsset::className()]);
//registerJsFile()的参数和registerCssFile()的参数一样，在上面的例子中注册的main.js文件依赖项JqueryAsset。
//也就是说main.js将会在jquery.js文件加载完成之后才加载。如果没有定义依赖项，则main.js和jquery.js将没有先后顺序。
//和registerCssFile()一样，我们也建议你使用asset bundles来注册外部js文件而不是使用registerJsFile()。

//5.6、注册asset bundles（重要）
//如先前所提到的，在页面中最好使用asset bundles，而不是直接在页面中使用css和javascript。关于asset bundles的相关信息可以查看asset manager。
//使用已经定义的asset bundles代码如下
\frontend\assets\AppAsset::register($this);


/******************************************************6、布局（Layout）************************************************************/
//在一个应用中如果大部分的页面显示的内容基本相同，那么使用全局布局文件无疑是最好的选择。
//布局文件中一般包括头部、尾部、主菜单以及其它在所有页面公共的部分。
//下面这个是最基本的一个布局文件。
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
    <div class="container">
        <?= $content ?>
    </div>
    <footer class="footer"> 2013 me :)</footer>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
<!-- 在上面的代码中$content是一个变量，它的值就是视图文件渲染之后的结果。
在代码的开始，我们使用php的方法use来引入Html帮助类。这个类主要功能就是用于对输出的结果进行编码。
另外还有一些特殊的方法如beginPage()/endPage(), head(), beginBody()/endBody() 这些在渲染页面的时候都触发相应的事件。你可以在这些事件里面注册脚本、连接以及处理页面等等。 -->

<!--******************************************************7、局部视图（Partial）************************************************************ -->
<?php
//有时候一些Html代码需要在多个视图页面使用，大多部情况下这些Html代码太简单了以至于创建部件(Widget)有点浪费。
//局部视图也是视图文件，它也存在于views目录下面并且文件名以“_”开头。例如我们要显示所有用户信息的列表，同时还在其它地方显示一个单独用户的信息。
//首先定义用户信息的局部文件_profile.php
?>
<div class="profile">
    <h2><?= Html::encode($username) ?></h2>
    <p><?= Html::encode($tagline) ?></p>
</div>
<?php //在index.php文件中显示所有用户的列表信息 ?>
<div class="user-index">
    <?php
    foreach ($users as $user) {
        echo $this->render('_profile', [
            'username' => $user->name,
            'tagline' => $user->tagline,
        ]);
    }
    ?>
</div>
<?php
/*在当前的视图页面中调用render()来渲染局部视图时候可以有多种不同的方式来指定局部视图文件。
 * 最常用的一种是像上面例子那样直接指定局部视图的文件名称。当然这个局部视图文件要和这个视图文件处于同一个目录下。
 * 如果局部视图文件是在子目录下面，那么就需要指定子目录的名称，如public/_profile
 * 另外也可以在路径中使用别名，如@app/views/common/_profile
 * 除了另外还可以使用绝对路径加上视图的名称如/user/_profile、 //user/_profile。
 * 绝对路径要以“/”或者"//"开头。如果以“/”开头将会从当前模块的view路径里面查找，如果以"//"开头，前者会从应用程序的view路径中查找
*/
?>

<!-- ******************************************************8、访问上下文***************************************************** -->
视图文件一般由控制器或者部件来调用，在这两种情况下我们都可以通过视图对象的$this->context来得到相应的控制器或者部件。例如想在当前的视图中得到路由信息可以用
<?php echo $this->context->getRoute(); ?>

<!-- ******************************************************9、静态页面（重要）***************************************************** -->
如果需要渲染一个静态页面可以使用ViewAction类。它会根据用户的设置调用这个action来显示相应的视图文件。
首先在控制器里面的actions里面
<?php
class SiteController extends Controller
{
    public function actions()
    {
        return [
            'static' => [
                'class' => '\yii\web\ViewAction',
            ],
        ];
    }

    //...
}
?>
在@app/views/site/pages/目录中创建index.php
//index.php
<h1>Hello, I am a static page!</h1>
现在可以通过/index.php?r=site/static来访问
默认情况下是通过GET参数中的view变量来显示相应的静态文件的。如果URL为/index.php?r=site/static?&view=about那么将会显示@app/views/site/pages/about.php静态文件。
静态文件默认按照如下顺序来显示
获取GET参数：view
如果没有指定view参数，将使用默认的index.php静态文件。
在静态文件的目录中查找相应的文件（viewPrefix）：pages为目录
使用相应的布局文件。
更多相关信息可以查看yii\web\ViewAction。

<!-- ******************************************************10、缓存区块***************************************************** -->
关于对区块的缓存可以查看缓存章节

<!-- ******************************************************11、自定义视图组件***************************************************** -->
由于view也是一个应用程序组件，所以你可以替换为你自己自定义的组件。自定义的视图组件一般从yii\base\View或者yii\web\View继承。
可以在应用程序的配置文件（如config/web.php）中进行设置：
return [
    // ...
    'components' => [
        'view' => [
            'class' => 'app\components\View',
        ],
        // ...
    ],
];



















