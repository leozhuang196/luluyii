<?php
$this->params['breadcrumbs'][] = ['label' => Yii::t('user', 'User Info'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('user', 'Update');
?>
<div class="user-info-update">
    <?= $this->render('_form', ['model' => $model]) ?>
</div>
