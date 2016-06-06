<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<div class="stm-img-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'stm_id')->textInput() ?>
    <?= $form->field($model, 'pic')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('shop', 'Create') : Yii::t('shop', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>