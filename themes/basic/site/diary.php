<?php
use yii\helpers\Html;
$this->title = '成长日记';
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
			<li>本人已把test模块的yii2学习笔记放在<a href="http://www.yiichina.com/">Yii Framework中文网</a></li>
		</ul>
		<h3>个人联系方式</h3>
		<ul>
			<li>QQ：452936616</li>
			<li>Email：452936616@qq.com</li>
		</ul>
		<h3>成长日记</h3>
		<ul>
			<li>2016-05-17：文章添加yiidoc/yii2-redactor编辑器</li>
			<li>2016-05-18：后台用户信息管理添加kartik-v/yii2-grid、kartik-v/yii2-editable（这个还没用到）扩展实现异步更新用户信息</li>
			<li>2016-05-18：后台用户信息管理添加kartik-v/yii2-widget-fileinput扩展想实现上传用户头像，但是未实现</li>
			<li>2016-05-19：前台文章的分页、后台界面的美化</li>
			<li>2016-05-24：前台文章的收藏和取消收藏，我的收藏、我的发布</li>
			<li>2016-05-25：商城模块商品的分类yii2-gtreetable</li>
			<li>2016-05-26：添加前后台总控制器，分别用不同的布局文件，让前后台的其他控制器继承；将总的后台用户过滤放在BackController中</li>
			<li>2016-05-27：添加网站的维护升级——组件的配置、在site控制器写维护升级页面</li>
			<li>2016-05-31：添加网站的日访问量</li>
			<li>2016-06-01：足球商城首页图片轮播——还未完成</li>
			<li>2016-06-02：前台注册页面和后台创建用户页面使用bootstrap modal弹窗</li>
		</ul>
	</div>
</div>