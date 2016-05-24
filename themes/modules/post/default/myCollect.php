<?php
use yii\helpers\Html;
use modules\user\models\UserInfo;
use modules\post\models\Post;
$this->title = '我的收藏';
?>
<div class='row'>
    <div class='col-md-3'>
        <?= $this->render('@themes/modules/user/default/nav')?>
    </div>
    <div class='col-md-6'>
        <div class='panel panel-default'>
            <div class='panel-heading'><?=Html::encode($this->title)?></div>
            <div class='panel-body'>
            	<ul class='media-list'>
            	<?php foreach ($collect as $key=>$value):?>
        			<li class='media'>
        				<div class='media-left'>
        					<?php $post = Post::findOne(['id'=>$value->post_id])?>
        					<?= Html::a(UserInfo::showImage(UserInfo::findOne(['user_id'=>$post->user_id]),['width'=>'60','height'=>'60']),['/user/default/show','username'=>$post->author])?>
    					</div>
        				<div class='media-body'>
        					<div class='media-heading media-action'>
        						<?= Html::a($post->title,['/post/default/show-post','id'=>$post->id])?>
        					</div>
        					<div class='media-action'>
        						<?= $post->author.' 发布于'.date('Y-m-d H:i',$value->created_time)?>
        					</div>
        				</div>
        			</li>
            	<?php endforeach;?>
            	</ul>
            </div>
        </div>
    </div>
</div>