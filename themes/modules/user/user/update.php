<?php
$this->title = Yii::t('user', 'Update User').':'.$model->username;
$this->params['breadcrumbs'][] = ['label' => Yii::t('user', 'User Manager'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->username, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('user', 'Update User');
?>
<div class="user-update">
    <?= $this->render('_form', ['model' => $model]) ?>
</div>
