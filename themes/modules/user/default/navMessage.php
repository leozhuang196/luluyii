<?php
use yii\helpers\Html;
use yii\widgets\Menu;
use modules\user\models\UserInfo;
use modules\user\models\User;
$user = User::getUser();
$userInfo = UserInfo::findOne(['user_id' => $user->id]);
?>
<div class='panel panel-default'>
    <div class='panel-heading'>
        <h3 class='panel-title'><?=Html::encode('私信首页')?></h3>
    </div>
    <div class='panel-body'>
        <?=Menu::widget([
            'options' => ['class'=>'nav nav-pills nav-stacked'],
            'items' => [
                ['label' => '写私信','url'=>'send-message'],
                ['label' => '收件箱','url'=>'notice-message'],
                ['label' => '已发送','url'=>'has-send-message'],
            ],
        ])?>
    </div>
</div>
