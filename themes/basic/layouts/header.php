<?php
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use modules\user\models\UserInfo;
use kartik\icons\Icon;
Icon::map($this);
NavBar::begin([
    'brandLabel' => Yii::$app->params['siteName'],
    //'brandLabel' => Yii::t('common', 'Site Name'),
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
        'class' => 'navbar-default navbar-fixed-top',
    ],
]);
echo Nav::widget([
    'options' => ['class' => 'nav navbar-nav '],
    'items' => [
        ['label' => Icon::show('user').'会员','url' => ['/user/default/users']],
        ['label' => '<span class="glyphicon glyphicon-shopping-cart"></span>足球商城','url' => ['/shop']],
    ],
    'encodeLabels' => false]);
if (Yii::$app->user->isGuest) {
    $menuItems[] = ['label' => '注册', 'url' => ['/user/default/signup']];
    $menuItems[] = ['label' => '登录', 'url' => ['/user/default/login']];
} else {
    $user = Yii::$app->user;
    $identity = $user->identity;
    $userInfo = UserInfo::findOne(['user_id' => $identity->id]);
    if (!in_array($identity->username, Yii::$app->params['adminName'])){
        $menuItems = [
            ['label' => '<span class="glyphicon glyphicon-bell"></span>','url' => ['/user/default/notice-message']],
            ['label' => UserInfo::showImage($userInfo,['width'=>20,'height'=>20]),
                'items' => [
                    ['label' => '<span class="glyphicon glyphicon-home"></span> 个人中心','url' => ['/user/default/modify-info']],
                    '<li class="divider"></li>',
                    ['label' => '<span class="glyphicon glyphicon-log-out"></span> 退出登录',
                        'url' => ['/user/default/logout'],'linkOptions' => ['data-method' => 'post']],
                ],
            ],
        ];
    }else{
        $menuItems = [
            ['label' => '<span class="glyphicon glyphicon-bell"></span>','url' => ['/user/default/notice-message']],
            ['label' => UserInfo::showImage($userInfo,['width'=>20,'height'=>20]),
                'items' => [
                    ['label' => '<span class="glyphicon glyphicon-home"></span> 个人中心','url' => ['/user/default/modify-info']],
                    ['label' => '<span class="glyphicon glyphicon-remove"></span> '.Yii::t('common', 'Back Manager'),'url' => ['/user/user']],
                    '<li class="divider"></li>',
                    ['label' => '<span class="glyphicon glyphicon-log-out"></span> 退出登录',
                        'url' => ['/user/default/logout'],'linkOptions' => ['data-method' => 'post']],
                ],
            ],
        ];
    }
}
echo Nav::widget([
    'options' => ['class' => 'nav navbar-nav navbar-right'],
    'encodeLabels' => false,
    'items' => $menuItems,
]);
NavBar::end();
?>