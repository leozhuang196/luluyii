<?php
use yii\helpers\Html;
use kartik\grid\GridView;
use modules\user\models\User;
$this->title = Yii::t('user', 'Visits');
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
            ['class' => 'yii\grid\ActionColumn',
             'header' => "操作",
            ],
        ],
        'export' => false,
        'panel' => [
            'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-user"></i>'.Yii::t('user', 'Visits').'</h3>',
            'type' => 'success',
            'before' => Html::a('<i class="glyphicon glyphicon-plus"></i>' .Yii::t('user', 'Create Visit'), ['create'], ['class' => 'btn btn-success']),
            'footer' => false,
            'after' => false
        ],
    ]); ?>
</div>
