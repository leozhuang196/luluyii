<?php
use yii\helpers\Html;
use modules\user\models\UserInfo;
$this->title = Yii::$app->params['siteName'];
?>
<div class='row'>
    <div class='col-md-10'>
        <div class='panel panel-default'>
            <div class='panel-heading'>
            	<?=Html::encode('所有文章')?>
            	<?= Html::a('<i class="fa fa-plus"></i> 发表文章',['default/create-post'],['class'=>"btn btn-success btn-xs pull-right"])?>
            </div>
            <div class='panel-body'>
            	<ul class='media-list'>
            	<?php foreach ($post as $key=>$value):?>
        			<li class='media'>
        				<div class='media-left'>
        					<?= Html::a(UserInfo::showImage(UserInfo::findOne(['user_id'=>$value['user_id']]),['width'=>'60','height'=>'60']),['//user/default/show','username'=>$value->author])?>
    					</div>
        				<div class='media-body'>
        					<div class='media-heading media-action'><?= '作者'.Html::a($value->author,['//user/default/show','username'=>$value->author])?></div>
        					<p><?= $value->content?></p>
        					<div class='media-action'>
        						<?= date('Y-m-d H:s',$value->created_time)?>
        					</div>
        				</div>
        			</li>
            	<?php endforeach;?>
            	</ul>
            </div>
        </div>
    </div>
</div>