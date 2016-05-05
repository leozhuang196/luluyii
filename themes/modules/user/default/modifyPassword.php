<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
$this->title = '修改密码';
?>
<div class='row'>
    <div class='col-md-3'>
        <?= $this->render('/default/nav')?>
    </div>
    <div class='col-md-9'>
        <div class='panel panel-default'>
            <div class='panel-heading'>
                <h3 class='panel-title'><?=Html::encode($this->title)?></h3>
            </div>
            <div class='panel-body'>
                <?php $form = ActiveForm::begin(['id'=>'modifyPasswordForm']);?>
                    <?=$form->field($model,'old_password')->passwordInput()?>
                    <?=$form->field($model,'new_password')->passwordInput()?>
                    <?=$form->field($model,'renew_password')->passwordInput()?>
                    <?=Html::submitButton('修改',['class'=>'btn btn-primary'])?>
                <?php ActiveForm::end();?>
            </div>
        </div>
    </div>
</div>