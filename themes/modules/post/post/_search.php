<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<div class="post-search">
    <?php $form = ActiveForm::begin(['action' => ['index'],'method' => 'get']); ?>
    <?= $form->field($model, 'id') ?>
    <?= $form->field($model, 'user_id') ?>
    <?= $form->field($model, 'author') ?>
    <?= $form->field($model, 'love_num') ?>
    <?= $form->field($model, 'hate_num') ?>
    <?php // echo $form->field($model, 'comment_num') ?>
    <?php // echo $form->field($model, 'view_num') ?>
    <?php // echo $form->field($model, 'collection') ?>
    <?php // echo $form->field($model, 'content') ?>
    <?php // echo $form->field($model, 'type') ?>
    <?php // echo $form->field($model, 'description') ?>
    <?php // echo $form->field($model, 'created_time') ?>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('user', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('user', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
