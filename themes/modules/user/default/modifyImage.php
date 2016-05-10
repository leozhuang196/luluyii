<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
//日期组件：composer require kartik-v/yii2-widget-datepicker "@dev"
use kartik\date\DatePicker;
use modules\user\models\UserInfo;
$this->title = '更换头像';
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
                	<?=UserInfo::showImage($model,'150');?>  <?=UserInfo::showImage($model,'100');?>  <?=UserInfo::showImage($model,'50');?>
                	<?=$form->field($model,'image')->fileInput()?>
                    <?=Html::submitButton('修改',['class'=>'btn btn-primary'])?>
                <?php ActiveForm::end();?>
            </div>
        </div>
    </div>
</div>