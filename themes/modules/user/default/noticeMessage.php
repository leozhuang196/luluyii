<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
use modules\user\models\User;
$this->title = '我的私信';
?>
<div class='row'>
    <div class='col-md-3'>
        <?= $this->render('/default/nav')?>
    </div>
    <div class='col-md-9'>
        <div class='panel panel-default'>
            <div class='panel-heading'>
                <?=Html::encode($this->title)?>
                <?= Html::a('发送私信',['default/send-message'])?>
            </div>
            <div class='panel-body'>
            	<?= DetailView::widget([
            	    'model' => $model,
            	    'attributes'=>[
            	       ['attribute'=>'message_from',
            	        'value' => Html::a($model->message_from,
            	            ['default/show','user_id'=>User::findOne(['username'=>$model->message_from])->id]),
            	        "format" => "raw"],
            	       'message',
        	    ]])?>
            </div>
        </div>
    </div>
</div>