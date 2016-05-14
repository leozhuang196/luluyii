<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<div class="post-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'user_id')->textInput() ?>
    <?= $form->field($model, 'author')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'love_num')->textInput() ?>
    <?= $form->field($model, 'hate_num')->textInput() ?>
    <?= $form->field($model, 'comment_num')->textInput() ?>
    <?= $form->field($model, 'view_num')->textInput() ?>
    <?= $form->field($model, 'collection')->textInput() ?>
    <?= $form->field($model, 'content')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'created_time')->textInput() ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('user', 'Create') : Yii::t('user', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>