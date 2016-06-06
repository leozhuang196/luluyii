<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="stm-search">
    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <?= $form->field($model, 'id') ?>
    <?= $form->field($model, 'is_use') ?>
    <?= $form->field($model, 'stm_type') ?>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('shop', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('shop', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>