<?php
$this->title = Yii::t('user', 'Update') . $model->username;
$this->params['breadcrumbs'][] = ['label' => Yii::t('user', 'Manager'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->username, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('user', 'Update');
?>
<div class="user-update">
    <?= $this->render('_form', ['model' => $model]) ?>
</div>
