<?php
use yii\widgets\DetailView;
use yii\helpers\Html;
$this->title = '个人积分';
?>
<div class='row'>
    <div class='col-md-3'>
        <?= $this->render('/default/nav')?>
    </div>
    <div class='col-md-6'>
        <div class='panel panel-default'>
            <div class='panel-heading'>
                <h3 class='panel-title'><?=Html::encode($this->title)?></h3>
            </div>
            <div class='panel-body'>
            	<?= DetailView::widget(['model'=>$model,'attributes' => ['score']])?>
            </div>
        </div>
    </div>
</div>