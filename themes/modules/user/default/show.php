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
                //当$user_info->sex不为空的时候才会显示
                //"visible" => $user_info->sex !== NUll,
                ],
                'location',
                'qq',
                'birthday',
            ],
         ]) ?>
    </div>
</div>