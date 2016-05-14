<?php
use yii\helpers\Html;
use modules\user\models\User;
use modules\user\models\UserInfo;
$this->title = '已发送';
?>
<div class='row'>
    <div class='col-md-3'><?= $this->render('/default/nav')?></div>
    <div class='col-md-3'><?= $this->render('/default/navMessage')?></div>
    <div class='col-md-6'>
        <div class='panel panel-default'>
            <div class='panel-heading'><?=Html::encode($this->title)?></div>
            <div class='panel-body'>
            	<ul class='media-list'>
            	<?php foreach ($message as $key=>$value):?>
        			<li class='media'>
        				<div class='media-left'>
        					<?php $user_id = User::findOne(['username'=>$value->to])->id?>
        					<?= Html::a(UserInfo::showImage(UserInfo::findOne(['user_id'=>$user_id]),['width'=>'60','height'=>'60']),['default/show','username'=>$value->to])?>
    					</div>
        				<div class='media-body'>
        					<div class='media-heading media-action'><?= '收件人'.Html::a($value->to,['default/show','username'=>$value->to])?></div>
        					<p><?= $value->content?></p>
        					<div class='media-action'>
        						<?= date('Y-m-d H:s',$value->send_time)?>
        					</div>
        				</div>
        			</li>
            	<?php endforeach;?>
            	</ul>
            </div>
        </div>
    </div>
</div>