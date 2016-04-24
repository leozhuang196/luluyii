<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
$this->title = '登录';
?>
<div class='row'>
	<div class='col-md-4 col-md-offset-4'>
		<div class='panel panel-default'>
			<div class='panel-heading'>
			     <h3 class='panel-title'><?= Html::encode($this->title);?></h3>
			</div>
			<div class='panel-body'>
			     <?php $form = ActiveForm::begin([
			         'id'=>'login-form',
		             'enableAjaxValidation'=>true,//启用ajax数据验证
			         'enableClientValidation'=>false,//由于启用了服务端ajax验证数据，关闭客户端数据验证
			     ]);?>
                    <?=$form->field($model,'username')->textInput(['placeholder'=>$model->getAttributeLabel('username')])?>
                    <?=$form->field($model,'password')->passwordInput(['placeholder'=>$model->getAttributeLabel('password')])?>
                    <?=$form->field($model,'rememberMe')->checkbox(['template'=>
                        "<div class=\"checkbox\">\n".Html::a('忘记密码?',['/user/find-password'],['class'=>'pull-right']).
                        "{beginLabel}\n{input}\n{labelTitle}\n{endLabel}\n{error}\n{hint}\n</div>"])?>

                    <?=Html::submitButton('提交',['class'=>'btn btn-block btn-primary'])?>
			     <?php ActiveForm::end();?>
			</div>
		</div>
	</div>
</div>