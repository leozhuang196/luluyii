<?php
use yii\widgets\DetailView;
use yii\helpers\Html;
use modules\user\models\UserFans;
$this->title = '积分、粉丝、关注';
?>
<div class='col-md-4'><?= $this->render('/default/nav')?></div>
<div class='col-md-4'>
    <div class='panel panel-default'>
        <div class='panel-heading'>
            <h3 class='panel-title'><?=Html::encode($this->title)?></h3>
        </div>
    	<?= DetailView::widget(
    	    ['model'=>$user_info,
	        'attributes' => [
    	       'score',
	            ['attribute' => '粉丝数量',
	            'format' => 'raw',
	            'value' => '<span class="badge">'.UserFans::fansNums($user->username).'</span>'.Html::a('全部粉丝',['show-fans2','username'=>$user->username],['class'=>'pull-right'])],
	            ['attribute' => '关注数量',
	                'format' => 'raw',
	                'value' => '<span class="badge">'.UserFans::focusNums($user->username).'</span>'.Html::a('全部关注',['show-focus2','username'=>$user->username],['class'=>'pull-right'])],
    	]])?>
    </div>
</div>