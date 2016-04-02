<?php
use yii\helpers\Html;
use yii\widgets\Menu;
$user = Yii::$app->user->identity;
?>
<div class='panel panel-default'>
    <div class='panel-heading'>
        <h3 class='panel-title'><?=Html::encode($user->username)?></h3>
    </div>
    <div class='panel-body'>
        <?=Menu::widget([
            /* 胶囊行导航 nav nav-pills */
            /* 垂直堆叠的导航 nav nav-pills nav-stacked*/
            'options' => ['class'=>'nav nav-pills nav-stacked'],
            'items' => [
                ['label' => '修改密码','url'=>'modify-password'],
                ['label' => '个人资料','url'=>'#'],
                ['label' => '更换头像','url'=>'#'],
                ['label' => '账号绑定','url'=>'#'],
            ],
        ])?>
    </div>
</div>