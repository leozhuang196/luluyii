<?php
use yii\helpers\Html;
use yii\grid\GridView;

$this->title = Yii::t('shop', 'Stm Imgs');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stm-img-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p>
        <?= Html::a(Yii::t('shop', 'Create Stm Img'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'stm_id',
            'pic',
            'title',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>