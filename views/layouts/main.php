<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\bootstrap\Alert;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-default navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => '首页', 'url' => ['/site/index']],
        ['label' => '问答', 'url' => ['#']],
    ];
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => $menuItems,
    ]);
    $menuItems =[];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => '注册', 'url' => ['/user/signup']];
        $menuItems[] = ['label' => '登录', 'url' => ['/user/login']];
    } else {
        $user = Yii::$app->user;
        $identity = $user->identity;

        $menuItems = [
            ['label' => '发表问题','url' => ['#'],],
            ['label' => $identity->username,
                'items' => [
                    ['label' => '<span class="glyphicon glyphicon-home"></span> 个人中心','url' => ['/user/modify-password'],],
                    ['label' => '<span class="glyphicon glyphicon-user"></span> 后台管理','url' => ['/admin'],],
                    '<li class="divider"></li>',
                    ['label' => '<span class="glyphicon glyphicon-log-out"></span> 退出登录',
                        'url' => ['/user/logout'],'linkOptions' => ['data-method' => 'post']],
                ],
            ],
        ];
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'encodeLabels' => false,
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <!-- 获取flash -->
        <?php
            if( Yii::$app->getSession()->hasFlash('success') ) {
                echo Alert::widget([
                    'options' => [
                        'class' => 'alert-success', //这里是提示框的class
                    ],
                    'body' => Yii::$app->getSession()->getFlash('success'), //消息体
                ]);
            }
            if( Yii::$app->getSession()->hasFlash('error') ) {
                echo Alert::widget([
                    'options' => [
                        'class' => 'alert-error',
                    ],
                    'body' => Yii::$app->getSession()->getFlash('error'),
                ]);
            }
        ?>
        <!-- $content变量的值 就是子页面渲染之后的代码。也就是说子页面中的内容将输出到这个地方-->
        <div><?= $content;?></div>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <div class='row'>
            <div class='col-lg-3'>
                <dt>网站信息</dt>
                <dd><a href="<?= Url::to(['/site/about'])?>">关于我们</a></dd>
            </div>
            <div class='col-lg-3'>
                <dt>相关合作</dt>
                <dd><a href="<?= Url::to(['/site/contact'])?>">联系我们</a></dd>
            </div>
            <div class='col-lg-3'>
                <dt>关注我们</dt>
                <dd><a href="<?= Url::to(['/site'])?>">成长日记</a></dd>
            </div>
            <div class='col-lg-3'>
                <dt>技术采用</dt>
                <dd><?= Yii::powered() ?> <?= Yii::getVersion() ?></dd>
            </div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
