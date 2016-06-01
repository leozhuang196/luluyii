<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Tabs;
use modules\shop\models\StmImg;
?>
<div class="stm-img-form">
	<?php //Html::textInput($name)?>
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);
        $fieldGroups = [];
        $fields = [];
        $fields[] = $form->field($model, 'is_use')->dropDownList(['1'=>'启用','0'=>'停用']);
        $fields[] = $form->field($model, 'stm_type')->dropDownList(Yii::$app->params['luluyiiGlobal']['locations']);
        $fieldGroups[] = ['label' => '<i class="glyphicon glyphicon-th-large"></i>' . Yii::t('shop', 'BasicInfo'), 
                        'content' =>'<div class="panel panel-primary"><div class="panel-body">'. implode('', $fields).'</div></div>'];
        
        echo Tabs::widget(['items' => $fieldGroups, 'navType' => 'nav-tabs', 'encodeLabels' => false]);
        echo Html::hiddenInput('_backendCSRF',Yii::$app->request->csrfToken);
        ?>
        <div class="form-group">
        	<?= Html::submitButton($model->isNewRecord ? Yii::t('shop', 'Create Stm') : Yii::t('shop', 'Update Stm'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    	</div>
    <?php ActiveForm::end(); ?>
</div>