<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<div class="visit-search">
    <?php $form = ActiveForm::begin(['action' => ['index'],'method' => 'get']); ?>
    <?= $form->field($model, 'id') ?>
    <?= $form->field($model, 'visit_ip') ?>
    <?= $form->field($model, 'visit_time') ?>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('user', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('user', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
