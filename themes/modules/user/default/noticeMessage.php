<?php
use yii\helpers\Html;
use app\assets\AppAsset;
use modules\user\models\User;
use modules\user\models\UserInfo;
AppAsset::register($this);
AppAsset::addCss($this, 'css/media.css');
$this->title = '我的私信';
?>
<div class='row'>
    <div class='col-md-3'>
        <?= $this->render('/default/nav')?>
    </div>
    <div class='col-md-6'>
        <div class='panel panel-default'>
            <div class='panel-heading'>
                <?=Html::encode($this->title)?>
                <?= Html::a('<i class="fa fa-plus"></i> 发送私信',['default/send-message'],['class'=>"btn btn-success btn-xs pull-right"])?>
            </div>
            <div class='panel-body'>
            	<ul class='media-list'>
            	<?php foreach ($message as $key=>$value):?>
        			<li class='media'>
        				<div class='media-left'>
        					<!-- 代码查询效率低，考虑优化 -->
        					<?php $user_id = User::findOne(['username'=>$value->from])->id?>
        					<?= Html::a(UserInfo::showImage(UserInfo::findOne(['user_id'=>$user_id]),['width'=>'60','height'=>'60']),['default/show','username'=>$value->from])?>
    					</div>
        				<div class='media-body'>
        					<div class='media-heading'><?= Html::a($value->from,['default/show','username'=>$value->from])?></div>
        					<p><?= $value->content?></p>
        					<div class='media-action'>
        						<?= date('Y-m-d H:s',$value->send_time)?>
        						<span class='pull-right'>
        							<?= Html::a('回复',['default/send-message','username' => $value->from])?>
								</span>
        					</div>
        				</div>
        			</li>
            	<?php endforeach;?>
            	</ul>
            </div>
        </div>
    </div>
</div>