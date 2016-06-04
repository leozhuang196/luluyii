<?php
use yii\helpers\Html;
use modules\user\models\SigninForm;
use modules\user\models\Visit;
$this->title = \Yii::$app->params['siteName'];
$date = date('Y年m月d日',time());
?>
<div class='row'>
    <div class='col-md-9'>
    <?= $this->render('@themes/modules/post/default/index',['tutorial'=>$tutorial,'question'=>$question,'chat'=>$chat])?>
    </div>
    <div class='col-md-3'>
    	<div class="btn-group btn-group-justified">
    	<?php if (SigninForm::isNotSignin()):?>
    		<?= Html::a('<i class="fa fa-calendar-plus-o"></i> 点此处签到<br>签到有好礼',['/user/default/signin'],['class'=>"btn btn-success"])?>
		<?php else :?>
			<?= Html::a('<i class="fa fa fa-calendar-check-o"></i>  今日已签到<br>已连续'.SigninForm::siginDay().'天','javascript:void(0)',['class'=>"btn btn-success disabled"])?>
		<?php endif;?>
    		<?= Html::a($date.'<br>已有'.SigninForm::siginNum().'人签到',['/user/default/signin-member'],['class'=>"btn btn-primary"])?>
        </div>
        <br/>
        <div class="btn-group btn-group-justified">
        	<?= Html::a($date.'<br>已有'.Visit::visitNum().'人访问'.Yii::$app->params['siteName'],'javascript:void(0)',['class'=>"btn btn-primary"])?>
        </div>
    </div>
</div>