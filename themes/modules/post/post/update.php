<?php
$this->title = Yii::t('post', 'Update Post').':'.$model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('post', 'Post'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('post', 'Update Post');
?>
<div class="post-update"><?= $this->render('_form', ['model' => $model]) ?></div>
