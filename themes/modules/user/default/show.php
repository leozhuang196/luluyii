<?php
use yii\widgets\DetailView;
use modules\user\models\User;
use yii\helpers\Html;
use modules\user\models\UserFans;
$this->title = $user->username.'的个人信息';
?>
<div class='col-md-4'>
	<div class="panel panel-default">
		<div class="panel-heading"><?=$this->title?>
		<?php if (User::isGuest() || User::getUser()->username !== $user->username):?>
			<?= Html::a('<i class="fa fa-envelope"></i> 私信',['default/send-message','username' => $user->username],['class'=>"btn btn-primary btn-xs pull-right"])?>
    		<?php if (User::isGuest() || !UserFans::exitFocus($user->username)):?>
    			<?= Html::a('<i class="fa fa-plus"></i> 关注',['default/focus','focus_who' => $user->username],['class'=>"btn btn-success btn-xs pull-right"])?>
    		<?php else:?>
    			<?= Html::a('<i class="fa fa-plus"></i> 取消关注',['default/no-focus','nofocus_who' => $user->username],['class'=>"btn btn-danger btn-xs pull-right"])?>
    		<?php endif;?>
		<?php else:?>
			<?= Html::a('<i class="fa fa-envelope"></i> 私信',null,['class'=>"btn btn-primary btn-xs pull-right"])?>
			<?= Html::a('<i class="fa fa-plus"></i> 关注',null,['class'=>"btn btn-success btn-xs pull-right disabled"])?>
		<?php endif;?>
		</div>
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