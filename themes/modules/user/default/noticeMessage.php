<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
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
            	    'attributes'=>['message_from','message']
        	    ])?>
            </div>
        </div>
    </div>
</div>