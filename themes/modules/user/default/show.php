<?php
use yii\helpers\Html;
$this->title = $user->username.'的个人信息';
?>
<div class='col-md-3'>
	<div class="panel panel-default">
		<div class="panel-heading"><?=$this->title?></div>
		<ul class="list-group">
			<?php if($user_info->sex!==NULL):?>
			<li class="list-group-item text-right">
            	<span class="pull-left"><strong>性别</strong></span>
            	<?php switch ($user_info->sex) {
            	    case 0:
            	       echo '男';
            	    break;
            	    case 1:
            	        echo '女';
        	        break;
            	    default:
            	        echo '保密';
            	    break;
            	}?>
            </li>
        	<?php endif;?>
        	<?php if($user_info->location):?>
            <li class="list-group-item text-right">
            	<span class="pull-left"><strong>城市</strong></span><?= Html::encode($user_info->location) ?>
            </li>
        	<?php endif;?>
        	<?php if($user_info->qq):?>
            <li class="list-group-item text-right">
            	<span class="pull-left"><strong>QQ</strong></span><?= Html::encode($user_info->qq) ?>
            </li>
        	<?php endif;?>
        	<?php if($user_info->birthday):?>
            <li class="list-group-item text-right">
            	<span class="pull-left"><strong>生日</strong></span><?= Html::encode($user_info->birthday) ?>
            </li>
        	<?php endif;?>
        </ul>
	</div>
</div>