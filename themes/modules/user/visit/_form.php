<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Tabs;
?>
<div class="visit-form">
    <?php $form = ActiveForm::begin(); 
    	$fieldGroups = [];
        $fields = [];
        $fields[] = $form->field($model, 'id')->textInput();
        $fields[] = $form->field($model, 'visit_ip')->textInput(['maxlength' => true]);
        $fields[] = $form->field($model, 'visit_time')->textInput();
            	
    	echo Tabs::widget(['items' => $fieldGroups, 'navType' => 'nav-tabs', 'encodeLabels' => false]);
    ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('user', 'Create') : Yii::t('user', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
