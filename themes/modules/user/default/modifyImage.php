<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use modules\user\models\UserInfo;
$this->title = '更换头像';
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
                <?php $form = ActiveForm::begin(['id'=>'modifyInfoForm','options' => ['enctype'=>'multipart/form-data']]);?>
                	<?=UserInfo::showImage($model,['width'=>'150','height'=>'150']);?>
                	<?=UserInfo::showImage($model,['width'=>'100','height'=>'100']);?>
                	<?=UserInfo::showImage($model,['width'=>'50','height'=>'50']);?>
                	<p><?=$form->field($model,'image')->fileInput()->label(false)?></p>
                    <?=Html::submitButton('修改',['class'=>'btn btn-primary'])?>
                <?php ActiveForm::end();?>
            </div>
        </div>
    </div>
</div>
