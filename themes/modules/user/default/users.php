<?php
use modules\user\models\User;
use yii\helpers\Html;
$this->title = '活跃用户';
?>
<div id="active-users" class="panel panel-default">
    <div class="panel-heading">
        <strong>TOP 10 活跃会员</strong>
        <div class="pull-right">目前已经有 <?= $count ?> 位会员加入了 <?php echo \Yii::$app->params['siteName']?></div>
    </div>
    <div class="panel-body row">
        <?php foreach ($user_info as $key => $value): ?>
        	<?php $user = User::findOne(['id'=>$value['user_id']]);?>
            <div class="col-md-2">
            	<div class='media user-card'>
            		<div class='media-left'>
            			<?= Html::a($value->showImage($value,['width'=>'60','height'=>'60']),['default/show','username'=>$user['username']])?>
            		</div>
            		<div class='media-body'>
            			<div class='media-heading'><?= Html::a($user['username'],['default/show','username'=>$user['username']])?></div>
            			<div class='media-action'><?= '积分:'.$value['score']?></div>
            		</div>
            	</div>
            </div>
        <?php endforeach ?>
    </div>
</div>
