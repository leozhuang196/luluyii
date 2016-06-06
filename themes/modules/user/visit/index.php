<?php
use kartik\grid\GridView;
use modules\user\models\User;
$this->title = Yii::t('user', 'Visit Manager');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="visit-index">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'visit_ip',
            ['attribute' => 'visit_time',
            'value' => function ($model) {
            return User::getCreatdTime($model->visit_time);
            }],
        ],
        'export' => false,
        'panel' => [
            'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-user"></i>'.Yii::t('user', 'Visit Manager').'</h3>',
            'type' => 'success',
            'footer' => false,
            'after' => false
        ],
    ]); ?>
</div>