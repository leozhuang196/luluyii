<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\modules\admin\models\config\Config;

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
        //'brandLabel' => Yii::$app->name,
        'brandLabel' => Config::findOne(['`key`'=>'sys_site_name'])->value,
        'brandUrl' => ['/admin'],
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems = [
            ['label' => '系统配置',
                'url'=>['/admin/config/'],
                'items'=>[
                    ['label'=>'基本配置','url'=>['/admin/config/basic']],
                    ['label'=>'主题配置','url'=>['/admin/config/theme']],
                ]
            ],
            ['label' => 'rbac',
                'url'=>['/admin/rbac/'],
                'items'=>[
                    ['label'=>'角色管理','url'=>['/admin/rbac/role']],
                    ['label'=>'权限管理','url'=>['/admin/rbac/permission']],
                ]
            ],
            ['label' => Yii::$app->user->identity->username,
                'items' => [
                    ['label'=>'<span class="glyphicon glyphicon-home"></span> 个人中心',
                        'url'=>['/user/modify-password']],
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
        <div><?= $content;?></div>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right">Powered by <a href="http://weibo.com/1905566773/profile?topnav=1&wvr=6&is_all=1">lulubin</a></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
