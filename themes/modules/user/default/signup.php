<?php
use yii\helpers\Html;
use yii\captcha\Captcha;
use yii\bootstrap\ActiveForm;
$this->title = '注册';
?>
<?php $form = ActiveForm::begin([
    'id'=>'signup-form',
    'enableAjaxValidation'=>true,//启用ajax数据验证
    'enableClientValidation'=>false,//由于启用了服务端ajax验证数据，关闭客户端数据验证
]);?>
<?=$form->field($model,'username')->textInput()?>
<?=$form->field($model,'email')->textInput()?>
<?=$form->field($model,'password')->passwordInput()?>
<?=$form->field($model,'repassword')->passwordInput()?>
<?=$form->field($model,'verifyCode')->widget(Captcha::className(), [
    'captchaAction' => '/site/captcha',
    'imageOptions'=>['alt'=>'验证码','title'=>'点击换图'],
    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
]);?>
<?=Html::submitButton('注册',['class'=>'btn btn-block btn-success'])?>
<?php ActiveForm::end();?>
