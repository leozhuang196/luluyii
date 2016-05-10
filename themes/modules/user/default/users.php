<?php
use yii\helpers\Html;
use modules\user\models\UserInfo;
$this->title = '活跃用户';
?>
<div id="active-users" class="panel panel-default">
    <div class="panel-heading">
        <strong>TOP 10 活跃会员</strong>
        <div class="pull-right">目前已经有 <?= $count ?> 位会员加入了 <?php echo \Yii::$app->params['siteName']?></div>
    </div>
    <div class="panel-body">
        <?php foreach ($model as $key => $value): ?>
            <div class="col-md-1">
            	<?= UserInfo::showImage(UserInfo::findOne(['user_id'=>$value['id']]))?>
                <?= Html::a($value['username'], ['/user/default/show', 'user_id' => $value['id']]) ?>
            </div>
        <?php endforeach ?>
    </div>
</div>