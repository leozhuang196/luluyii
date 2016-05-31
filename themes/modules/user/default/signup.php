<?php
use yii\helpers\Html;
use yii\captcha\Captcha;
use yii\bootstrap\ActiveForm;
$this->title = '注册';
?>
<?php if ($this->beginCache('signup',['enabled'=>Yii::$app->request->isGet])){?>
<div id='signup' class='row'>
	<div class='col-md-4 col-md-offset-4'>
		<div class='panel panel-default'>
		    <div class='panel-heading'>
			     <h3 class='panel-title'><?= Html::encode($this->title);?></h3>
			</div>
			<div class='panel-body'>
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
			</div>
		</div>
	</div>
</div>
<?php $this->endCache();}?>