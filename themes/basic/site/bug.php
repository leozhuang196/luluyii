<?php
use yii\helpers\Html;
$this->title = 'bug修复';
?>
<div id="site-about" class='panel panel-default'>
	<div class='panel-heading'><?= Html::encode($this->title)?></div>
	<div class='panel-body'>
	<h2>待修复bug</h2>
	<ul>
		<li>个人信息中，用户只修改其中一项信息保存时其他信息变为0</li>
		<li>关注、取关局部页面刷新，否则会导致连续点击报错</li>
		<li>后台删除用户的时候同时删除用户信息</li>
	</ul>
	<h2>待扩展和完善的功能</h2>
	<ul>
		<li>验证码显示问题</li>
		<li>使用高级版本的yii2</li>
		<li>第三方登录</li>
		<li>提醒模块</li>
		<li>文章模块的rbac</li>
		<li>文章的评论模块、查看、顶、踩等</li>
		<li>主页模块</li>
		<li>修改头修的预览与截屏</li>
		<li>搜索文章、搜索用户</li>
		<li>私信表，显示用户与用户之间的对话，查询用户的时候暂存表再查表</li>
		<li>输入框有个清除已输入内容的按钮</li>
		<li>缓存、场景、事件、事务等的使用</li>
		<li>使用nginx服务器</li>
	</ul>
	</div>
</div>