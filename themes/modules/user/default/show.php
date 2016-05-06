<?php
use yii\helpers\Html;
$this->title = $user->username.'的个人信息';
?>
<div class='col-md-3'>
	<div class="panel panel-default">
		<div class="panel-heading"><?=$this->title?></div>
		<ul class="list-group">
			<li class="list-group-item text-right">
            	<span class="pull-left"><strong>性别</strong></span><?= Html::encode($user_info->sex) ?>
            </li>
            <li class="list-group-item text-right">
            	<span class="pull-left"><strong>城市</strong></span><?= Html::encode($user_info->location) ?>
            </li>
            <li class="list-group-item text-right">
            	<span class="pull-left"><strong>QQ</strong></span><?= Html::encode($user_info->qq) ?>
            </li>
            <li class="list-group-item text-right">
            	<span class="pull-left"><strong>生日</strong></span><?= Html::encode($user_info->birthday) ?>
            </li>
        </ul>
	</div>
</div>