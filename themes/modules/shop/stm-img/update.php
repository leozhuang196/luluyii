<?php
use yii\helpers\Html;

$this->title = Yii::t('shop', 'Update {modelClass}: ', [
    'modelClass' => 'Stm Img',
]) . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('shop', 'Stm Imgs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('shop', 'Update');
?>
<div class="stm-img-update">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
