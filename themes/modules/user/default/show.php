<?php
use yii\widgets\DetailView;
$this->title = $user->username.'的个人信息';
?>
<div class='col-md-3'>
	<div class="panel panel-default">
		<div class="panel-heading"><?=$this->title?></div>
		<?= DetailView::widget([
            'model' => $user_info,
            'attributes' => [
                ['attribute' => 'sex',
                'value' => $user_info->getSex($user_info->sex),
                ],
                'location',
                'qq',
                'birthday',
            ],
         ]) ?>
    </div>
</div>