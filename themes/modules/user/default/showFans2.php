<?php
use yii\helpers\Html;
use modules\user\models\User;
use modules\user\models\UserInfo;
?>
<div class='row'>
	<?= $this->render('/default/showScore',['user'=>$user,'user_info'=> $user_info])?>
    <div class='col-md-4'>
        <div class='panel panel-default'>
            <div class='panel-heading'>
                <h3 class='panel-title'><?=Html::encode('全部粉丝')?></h3>
            </div>
            <div class='panel-body'>
            	<ul class='media-list'>
        			<?php foreach ($user_fans as $key=>$value):?>
        				<li class='media'>
        					<div class='media-left'>
        						<?php $user_id = User::findOne(['username'=>$value->from])->id?>
        						<?= Html::a(UserInfo::showImage(UserInfo::findOne(['user_id'=>$user_id]),['width'=>'60','height'=>'60']),['default/show','username'=>$value->from])?>
        					</div>
        					<div class='media-body'>
        						<div class='media-heading'><?= Html::a($value->from,['default/show','username'=>$value->from])?></div>
        						<div class='media-action'>
        							<?= date('Y-m-d H:s',$value->focus_time)?>
        						</div>
        					</div>
        				</li>
        			<?php endforeach;?>
            	</ul>
            </div>
        </div>
    </div>
</div>
