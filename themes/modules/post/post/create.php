<?php
use yii\helpers\Html;
$this->title = Yii::t('user', 'Create Post');
$this->params['breadcrumbs'][] = ['label' => Yii::t('user', 'Posts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>