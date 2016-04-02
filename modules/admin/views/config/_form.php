<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Config */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="config-form">
<!-- 在Widget中begin()方法会调用int方法 -->
<!-- 表单form自身的属性
$action：设置当前表单提交的url地址，如果为空则是当前的url
$method：提交方法，post或者get，默认为post
$option：这个里面设置表单的其它的属性，如id等，如果没有设置id，将会自动生成一个以$autoIdPrefix为前缀的自动增加的id -->
    <?php $form = ActiveForm::begin(); ?>

<!-- Yii生成的每个field由4部分组成：
最外层div为每个field的容器，
label为每个field的文本说明，
input为输入元素，
还有一个div为错误提示信息。 -->
<!--
<div class="form-group field-loginform-username required has-error">
    <label class="control-label" for="loginform-username">Username</label>
    <input type="text" id="loginform-username" class="form-control" name="LoginForm[username]">
    <div class="help-block">Username cannot be blank.</div>
</div>
-->

    <?= $form->field($model, 'key')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'value')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
<!-- 在最后的end()方法会调用run方法 -->
    <?php ActiveForm::end(); ?>

</div>
