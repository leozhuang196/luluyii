<!-- 验证码 -->
<?php
use yii\helpers\Html;
use yii\captcha\Captcha;
use yii\bootstrap\ActiveForm;

?>
<?php $form=ActiveForm::begin()?>
<?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
]) ?>
<?=Html::submitButton('提交',['class'=>'btn btn-block btn-success'])?>
<?php ActiveForm::end()?>