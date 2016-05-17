<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<div class="user-info-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'user_id')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'score')->textInput(['maxlength' => true]) ?>
     <?= $form->field($model, 'signature')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'sex')->textInput() ?>
    <?= $form->field($model, 'qq')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'birthday')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'location')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'signin_day')->textInput(['maxlength' => true]) ?>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('user', 'Update'), ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>