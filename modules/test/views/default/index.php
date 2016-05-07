<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<div>
    <?php $form = ActiveForm::begin([ 'options' => [ 'enctype' => 'multipart/form-data' ]]); ?>
    <?= $form->field($model, 'file')->fileInput() ?>
    <div class="form-group">
        <?= Html::submitButton('上传', ['btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
