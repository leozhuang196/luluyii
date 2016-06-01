<?php
use yii\helpers\Html;

$this->title = Yii::t('shop', 'Create Stm Img');
$this->params['breadcrumbs'][] = ['label' => Yii::t('shop', 'Stm Imgs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stm-img-create">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
