<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
$this->title = '发送私信';
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
                <?php $form = ActiveForm::begin(['id'=>'sendMessageForm']);?>
                    <?=$form->field($model,'username')->textInput()?>
                    <?=$form->field($model,'message')->textInput()?>
                    <?=Html::submitButton('发送',['class'=>'btn btn-primary'])?>
                <?php ActiveForm::end();?>
            </div>
        </div>
    </div>
</div>