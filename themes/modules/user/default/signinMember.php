<?php
use modules\user\models\User;
use yii\helpers\Html;
$this->title = '今日签到会员';
?>
<div id="active-users" class="panel panel-default">
    <div class="panel-heading">
        <strong><?= $this->title?></strong>
    </div>
    <div class="panel-body row">
        <?php foreach ($member as $key => $value): ?>
        	<?php $user = User::findOne(['id'=>$value['user_id']]);?>
            <div class="col-md-2">
            	<div class='media user-card'>
            		<div class='media-left'>
            			<?= Html::a($value->showImage($value,['width'=>'60','height'=>'60']),['default/show','user_id'=>$user['username']])?>
            		</div>
            		<div class='media-body'>
            			<div class='media-heading'><?= Html::a($user['username'],['default/show','username'=>$user['username']])?></div>
            			<div class='media-action'><?= '连续签到:'.$value['signin_day'].'天'?></div>
            		</div>
            	</div>
            </div>
        <?php endforeach ?>
    </div>
</div>
