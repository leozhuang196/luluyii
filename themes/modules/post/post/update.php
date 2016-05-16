<?php
$this->title = Yii::t('post', 'Update {modelClass}: ', ['modelClass' => 'Post']) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('post', 'Posts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('post', 'Update');
?>
<div class="post-update"><?= $this->render('_form', ['model' => $model]) ?></div>