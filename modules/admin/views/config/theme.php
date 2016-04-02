<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="config-basic">
    <?php $form = ActiveForm::begin(); ?>
    <div class='row'>
        <div class='col-md-4 col-md-offset-3'>
            <div class='panel panel-default'>
                <div class='panel-body'>
                    <?= $form->field($model, 'sys_site_theme') ?>
                    <div class="form-group">
                        <?= Html::submitButton('修改', ['class' => 'btn btn-primary']) ?>
                    </div>
                </div>
            </div>
       </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>