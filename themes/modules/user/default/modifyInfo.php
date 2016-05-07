<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
//日期组件：composer require kartik-v/yii2-widget-datepicker "@dev"
use kartik\date\DatePicker;
use modules\user\models\UserInfo;
$this->title = '修改个人信息';
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
                <?php $form = ActiveForm::begin(['id'=>'modifyInfoForm','options' => ['enctype'=>'multipart/form-data']]);?>
                	<?=UserInfo::showImage($model,'150');?>
                	<?=$form->field($model,'image')->fileInput()?>
                    <?=$form->field($model,'sex')->inline()->radioList((['0'=>'男','女','保密']))?>
                    <?=$form->field($model,'qq')->textInput()?>
                    <?=$form->field($model,'location')->textInput()?>
                    <?= $form->field($model, 'birthday')->widget(DatePicker::classname())?>
                    <?=Html::submitButton('修改',['class'=>'btn btn-primary'])?>
                <?php ActiveForm::end();?>
            </div>
        </div>
    </div>
</div>