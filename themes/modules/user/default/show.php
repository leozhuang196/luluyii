<?php
use yii\widgets\DetailView;
use modules\user\models\User;
$this->title = $user->username.'的个人信息';
?>
<div class='col-md-3'>
	<div class="panel panel-default">
		<div class="panel-heading"><?=$this->title?></div>
		<?= DetailView::widget([
            'model' => $user_info,
            'attributes' => [
                ['attribute' => 'image',
                    'format' => [
                        'image',
                        ["width"=>"84",
                        "height"=>"84"
                        ]],
                'value' => '../../'.$user_info->image],
                'score',
                ['attribute' => 'sex',
                'value' => $user_info->getSex($user_info->sex),
                //当$user_info->sex不为空的时候才会显示
                //"visible" => $user_info->sex !== NUll,
                ],
                'location',
                'qq',
                'birthday',
                'signature',
                ['attribute' => '注册时间',
                 'value' => User::getCreatdTime($user->created_at),]
            ],
         ]) ?>
    </div>
</div>