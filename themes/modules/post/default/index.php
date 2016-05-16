<?php
use yii\helpers\Html;
use modules\user\models\UserInfo;
use modules\post\models\Post;
$this->title = Yii::$app->params['siteName'];
?>
<div class='panel panel-default'>
    <div class='panel-heading'>
    	<?=Html::encode('教程')?>
    	<?= Html::a('<i class="fa fa-plus"></i> 发表教程',['default/create-post',['type'=>Post::POST_TYPE_TUTORIAL]],['class'=>"btn btn-success btn-xs pull-right"])?>
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
					<p><?= Html::a($value->title,['default/show-post','id'=>$value->id])?></p>
					<div class='media-action'>
						<?= date('Y-m-d H:s',$value->created_time)?>
						<span class='pull-right'><?= Html::a('查看',['default/show-post','id'=>$value->id])?></span>
					</div>
				</div>
			</li>
    	<?php endforeach;?>
    	</ul>
    </div>
</div>

<div class='panel panel-default'>
    <div class='panel-heading'>
    	<?=Html::encode('问答')?>
    	<?= Html::a('<i class="fa fa-plus"></i> 发表问答',['default/create-post',['type'=>Post::POST_TYPE_CHAT]],['class'=>"btn btn-success btn-xs pull-right"])?>
    </div>
    <div class='panel-body'>
    	<ul class='media-list'>
    	<?php foreach ($question as $key=>$value):?>
			<li class='media'>
				<div class='media-left'>
					<?= Html::a(UserInfo::showImage(UserInfo::findOne(['user_id'=>$value['user_id']]),['width'=>'60','height'=>'60']),['//user/default/show','username'=>$value->author])?>
				</div>
				<div class='media-body'>
					<div class='media-heading media-action'><?= $value->author?></div>
					<p><?= Html::a($value->title,['default/show-post','id'=>$value->id])?></p>
					<div class='media-action'>
						<?= date('Y-m-d H:s',$value->created_time)?>
						<span class='pull-right'><?= Html::a('查看',['default/show-post','id'=>$value->id])?></span>
					</div>
				</div>
			</li>
    	<?php endforeach;?>
    	</ul>
    </div>
</div>

<div class='panel panel-default'>
    <div class='panel-heading'>
    	<?=Html::encode('闲聊')?>
    	<?= Html::a('<i class="fa fa-plus"></i> 发表闲聊',['default/create-post',['type'=>Post::POST_TYPE_CHAT]],['class'=>"btn btn-success btn-xs pull-right"])?>
    </div>
    <div class='panel-body'>
    	<ul class='media-list'>
    	<?php foreach ($chat as $key=>$value):?>
			<li class='media'>
				<div class='media-left'>
					<?= Html::a(UserInfo::showImage(UserInfo::findOne(['user_id'=>$value['user_id']]),['width'=>'60','height'=>'60']),['//user/default/show','username'=>$value->author])?>
				</div>
				<div class='media-body'>
					<div class='media-heading media-action'><?= $value->author?></div>
					<p><?= Html::a($value->title,['default/show-post','id'=>$value->id])?></p>
					<div class='media-action'>
						<?= date('Y-m-d H:s',$value->created_time)?>
						<span class='pull-right'><?= Html::a('查看',['default/show-post','id'=>$value->id])?></span>
					</div>
				</div>
			</li>
    	<?php endforeach;?>
    	</ul>
    </div>
</div>