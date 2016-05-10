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
    <div class="panel-body">
        <?php foreach ($user_info as $key => $value): ?>
        	<?php $user = User::findOne(['id'=>$value['user_id']]);?>
            <div class="col-md-1">
            	<?= Html::a($value->showImage($value,'60','60'),['default/show','user_id'=>$value['user_id']])?>
            	<?= Html::a($user['username'],['default/show','user_id'=>$value['user_id']])?></br>
            	<?= '积分:'.$value['score']?>
            </div>
        <?php endforeach ?>
    </div>
</div>