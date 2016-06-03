<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Tabs;
?>
<div class="user-info-form">
    <?php $form = ActiveForm::begin(); 
    	$fieldGroups = [];
        $fields = [];
        $fields[] = $form->field($model, 'user_id')->textInput(['maxlength' => true]);
        $fields[] = $form->field($model, 'image')->textInput(['maxlength' => true]);
        $fields[] = $form->field($model, 'sex')->textInput();
        $fields[] = $form->field($model, 'qq')->textInput(['maxlength' => true]);
        $fields[] = $form->field($model, 'birthday')->textInput(['maxlength' => true]);
        $fields[] = $form->field($model, 'location')->textInput(['maxlength' => true]);
        $fields[] = $form->field($model, 'score')->textInput();
        $fields[] = $form->field($model, 'signin_time')->textInput(['maxlength' => true]);
        $fields[] = $form->field($model, 'signin_day')->textInput(['maxlength' => true]);
        $fields[] = $form->field($model, 'signature')->textInput(['maxlength' => true]);
            	
    	echo Tabs::widget(['items' => $fieldGroups, 'navType' => 'nav-tabs', 'encodeLabels' => false]);
    ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('user', 'Create') : Yii::t('user', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
