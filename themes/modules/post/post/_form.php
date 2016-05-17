<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<div class="post-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'author')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'content')->widget(\yii\redactor\widgets\Redactor::className(),['clientOptions'=>['lang'=>'zh_cn']])?>
    <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'love_num')->textInput() ?>
    <?= $form->field($model, 'hate_num')->textInput() ?>
    <?= $form->field($model, 'comment_num')->textInput() ?>
    <?= $form->field($model, 'view_num')->textInput() ?>
    <?= $form->field($model, 'collection')->textInput() ?>
    <?= $form->field($model, 'created_time')->textInput() ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('post', 'Create') : Yii::t('post', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>