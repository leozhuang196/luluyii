<?php
$this->title = Yii::t('user', 'Update').':'.$model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('user', 'Visits'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('user', 'Update');
?>
<div class="visit-update">
    <?= $this->render('_form', ['model' => $model]) ?>
</div>
