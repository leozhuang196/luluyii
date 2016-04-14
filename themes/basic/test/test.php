<!-- 验证码 -->
<?php
use yii\helpers\Html;
use yii\captcha\Captcha;
use yii\bootstrap\ActiveForm;
?>


<!-- 上传图片 -->
<?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']])?>
<?= $form->field($model, 'file')->fileInput()?>
<?=Html::submitButton('提交',['class'=>'btn btn-success'])?>
<?php ActiveForm::end()?>