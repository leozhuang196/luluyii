<?php
$this->title = Yii::t('shop', 'Create Stm');
$this->params['breadcrumbs'][] = ['label' => Yii::t('shop', 'Stm'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stm-create">
    <?= $this->render('_form', ['model' => $model,]) ?>
</div>