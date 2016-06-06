<?php
$this->title = Yii::t('shop', 'Update {modelClass}: ', ['modelClass' => 'Stm',]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('shop', 'Stms'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('shop', 'Update');
?>
<div class="stm-update">
    <?= $this->render('_form', ['model' => $model,]) ?>
</div>