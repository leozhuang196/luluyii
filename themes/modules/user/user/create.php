<?php
use yii\helpers\Html;
$this->title = Yii::t('user', 'Create');
$this->params['breadcrumbs'][] = ['label' => Yii::t('user', 'Manager'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-create">
    <?= $this->render('_form', ['model' => $model]) ?>
</div>