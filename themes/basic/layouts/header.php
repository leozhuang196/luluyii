<?php
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use modules\user\models\UserInfo;
use kartik\icons\Icon;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\helpers\Url;

Icon::map($this);
NavBar::begin([
    'brandLabel' => Yii::$app->params['siteName'],
    //'brandLabel' => Yii::t('common', 'Site Name'),
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
        'class' => 'navbar-inverse navbar-fixed-top',
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
    $menuItems[] = '<li>'.Html::a(Yii::t('user', 'Signup'), ['/user/default/signup'], ['data-toggle' => 'modal','data-target' => '#signup-modal',]).'</li>';
    $menuItems[] = ['label' => Yii::t('user', 'Login'), 'url' => ['/user/default/login']];
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

//注册页面采用bootstrap的moadl弹窗
Modal::begin([
    'id' => 'signup-modal',
    'header' => '<h4 class="modal-title">'.Yii::t('user', 'Signup').'</h4>',
    'footer' => '<a href="#" class="btn btn-primary" data-dismiss="modal">关闭</a>',
]);
$requestUrl = Url::toRoute('/user/default/signup');
$js = <<<JS
$.get('{$requestUrl}', {},
    function (data) {
        $('.modal-body').html(data);
    }
);
JS;
//Yii::$app->user->isGuest这句要加进去，只有未登录用户才需要加载上面的js，否则页面会持续跳转到首页（原因未知）
if (Yii::$app->user->isGuest){
    $this->registerJs($js);
}
Modal::end();
?>
