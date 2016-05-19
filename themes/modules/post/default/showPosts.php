<?php
use yii\helpers\Html;
use modules\user\models\UserInfo;
use modules\post\models\Post;
use yii\widgets\LinkPager;
$this->title = Post::getPostType($type);
$this->params['breadcrumbs'][] = $this->title;
?>
<div class='panel panel-default'>
    <div class='panel-heading'>
    	<?=Html::encode($this->title)?>
    	<?= Html::a('<i class="fa fa-plus"></i> '.Yii::t('post', 'Create').$this->title,['/post/default/create-post','type'=>$type],['class'=>"btn btn-success btn-xs pull-right"])?>
    </div>
    <div class='panel-body'>
    	<ul class='media-list'>
    	<?php foreach ($model as $key=>$value):?>
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
    <?= LinkPager::widget(['pagination' => $pages]);?>
</div>