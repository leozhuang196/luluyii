<?php
use yii\helpers\Html;
use modules\user\models\UserInfo;
use modules\post\models\Post;
$this->title = '我的发布';
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
            	<?php foreach ($post as $key=>$value):?>
        			<li class='media'>
        				<div class='media-body'>
        					<div class='media-heading media-action'>
        						<?= Html::a($value->title,['/post/default/show-post','id'=>$value->id])?>
        						<span class='pull-right'><?= date('Y-m-d H:i',$value->created_time)?></span>
        					</div>
        				</div>
        			</li>
            	<?php endforeach;?>
            	</ul>
            </div>
        </div>
    </div>
</div>