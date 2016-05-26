<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use modules\post\models\PostType;
use yii\bootstrap\Tabs;
?>
<div class="post-form">
 <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);
    $fieldGroups = [];
    $fields = [];
    $fields[] = $form->field($model, 'author')->textInput();
    $fields[] = $form->field($model, 'title')->textInput();
    $fields[] = $form->field($model, 'type')->dropDownList(ArrayHelper::map(PostType::find()->all(), 'type_id', 'name'));
    $fields[] = $form->field($model, 'love_num')->textInput();
    $fields[] = $form->field($model, 'hate_num')->textInput();
    $fields[] = $form->field($model, 'comment_num')->textInput();
    $fields[] = $form->field($model, 'view_num')->textInput();
    $fields[] = $form->field($model, 'collection')->textInput();
    $fields[] = $form->field($model, 'created_time')->textInput();
    $fieldGroups[] = ['label' => '<i class="glyphicon glyphicon-th-large"></i>' . Yii::t('post', 'BasicInfo'), 
                    'content' =>'<div class="panel panel-primary"><div class="panel-body">'. implode('', $fields).'</div></div>'];
    
    $fields = [];
    $fields[] = $form->field($model, 'content')->widget(\yii\redactor\widgets\Redactor::className(),['clientOptions'=>['lang'=>'zh_cn']]);
    $fieldGroups[] = ['label' => '<i class="glyphicon glyphicon-list-alt"></i>' . Yii::t('post', 'Content'),
        'content' =>'<div class="panel panel-primary"><div class="panel-body">'. implode('', $fields).'</div></div>'];
    
    echo Tabs::widget(['items' => $fieldGroups, 'navType' => 'nav-tabs', 'encodeLabels' => false]);
 ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('post', 'Create') : Yii::t('post', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>