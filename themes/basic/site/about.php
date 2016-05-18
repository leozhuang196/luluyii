<?php
use yii\helpers\Html;
$this->title = '关于我们';
?>
<div id="site-about" class='panel panel-default'>
	<div class='panel-heading'><?= Html::encode($this->title)?></div>
	<div class='panel-body'>
		<h3>项目简介</h3>
		<ul>
			<li>lulubin的第一个项目</li>
			<li>本项目是在公司实习期间做的简单项目</li>
			<li>本项目参考huajuan、getYii等开源项目</li>
			<li>test模块为yii2学习笔记</li>
		</ul>
		<h3>个人联系方式</h3>
		<ul>
			<li>QQ：452936616</li>
			<li>Email：452936616@qq.com</li>
		</ul>
	</div>
</div>