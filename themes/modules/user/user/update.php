<?php
use yii\helpers\Html;
$this->title = '修改用户: ' . ' ' . $model->username;
$this->params['breadcrumbs'][] = ['label' => '管理用户', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->username, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '修改用户';
?>
<div class="user-update">
    <?= $this->render('_form', ['model' => $model]) ?>
</div>
