<?php
use yii\helpers\Html;
use modules\user\models\UserInfo;
use modules\post\models\Post;
$this->title = Yii::$app->params['siteName'];
?>
<div class='panel panel-default'>
    <div class='panel-heading'>
    	<strong><?=Html::encode('教程')?></strong>
    	<?= Html::a('更多教程>>',['/post/default/show-posts','type'=>Post::POST_TYPE_TUTORIAL],['class'=>"btn btn-xs pull-right"])?>
    </div>
    <div class='panel-body'>
    	<ul class='media-list'>
    	<?php foreach ($tutorial as $key=>$value):?>
			<li class='media'>
				<div class='media-left'>
					<?= Html::a(UserInfo::showImage(UserInfo::findOne(['user_id'=>$value['user_id']]),['width'=>'60','height'=>'60']),['//user/default/show','username'=>$value->author])?>
				</div>
				<div class='media-body'>
					<div class='media-heading media-action'><?= $value->author?></div>
					<p><?= Html::a($value->title,['//post/default/show-post','id'=>$value->id])?></p>
					<div class='media-action'>
						<?= date('Y-m-d H:s',$value->created_time)?>
						<span class='pull-right'><?= Html::a('查看',['/post/default/show-post','id'=>$value->id])?></span>
					</div>
				</div>
			</li>
    	<?php endforeach;?>
    	</ul>
    </div>
</div>

<div class='panel panel-default'>
    <div class='panel-heading'>
    	<strong><?=Html::encode('问答')?></strong>
    	<?= Html::a('更多问答>>',['/post/default/show-posts','type'=>Post::POST_TYPE_QUESTION],['class'=>"btn btn-xs pull-right"])?>
    </div>
    <div class='panel-body'>
    	<ul class='media-list'>
    	<?php foreach ($question as $key=>$value):?>
			<li class='media'>
				<div class='media-left'>
					<?= Html::a(UserInfo::showImage(UserInfo::findOne(['user_id'=>$value['user_id']]),['width'=>'60','height'=>'60']),['/user/default/show','username'=>$value->author])?>
				</div>
				<div class='media-body'>
					<div class='media-heading media-action'><?= $value->author?></div>
					<p><?= Html::a($value->title,['/post/default/show-post','id'=>$value->id])?></p>
					<div class='media-action'>
						<?= date('Y-m-d H:s',$value->created_time)?>
						<span class='pull-right'><?= Html::a('查看',['/post/default/show-post','id'=>$value->id])?></span>
					</div>
				</div>
			</li>
    	<?php endforeach;?>
    	</ul>
    </div>
</div>

<div class='panel panel-default'>
    <div class='panel-heading'>
    	<strong><?=Html::encode('闲聊')?></strong>
    	<?= Html::a('更多闲聊>>',['/post/default/show-posts','type'=>Post::POST_TYPE_CHAT],['class'=>"btn btn-xs pull-right"])?>
    </div>
    <div class='panel-body'>
    	<ul class='media-list'>
    	<?php foreach ($chat as $key=>$value):?>
			<li class='media'>
				<div class='media-left'>
					<?= Html::a(UserInfo::showImage(UserInfo::findOne(['user_id'=>$value['user_id']]),['width'=>'60','height'=>'60']),['/user/default/show','username'=>$value->author])?>
				</div>
				<div class='media-body'>
					<div class='media-heading media-action'><?= $value->author?></div>
					<p><?= Html::a($value->title,['/post/default/show-post','id'=>$value->id])?></p>
					<div class='media-action'>
						<?= date('Y-m-d H:s',$value->created_time)?>
						<span class='pull-right'><?= Html::a('查看',['/post/default/show-post','id'=>$value->id])?></span>
					</div>
				</div>
			</li>
    	<?php endforeach;?>
    	</ul>
    </div>
</div>
