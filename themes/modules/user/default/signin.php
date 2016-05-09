<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
$this->title = '签到';
?>
<div class='row'>
    <div class='col-md-2'>
        <div class='panel panel-default'>
            <div class='panel-body'>
                <?php $form = ActiveForm::begin(['id'=>'signinForm']);?>
                	<?=$form->field($model,'signin_time')->hiddenInput(['value'=>time()])?>
                    <?=Html::submitButton('签到',['class'=>'btn btn-primary','disable'=>false])?>
                <?php ActiveForm::end();?>
            </div>
        </div>
    </div>
</div>