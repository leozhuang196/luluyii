<?php
use yii\helpers\Html;
use kartik\grid\GridView;
$this->title = Yii::t('user', 'User Infos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-info-index">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'user_id',
            'image',
            'sex',
            'qq',
            'birthday',
            'location',
            'score',
            'signin_time',
            'signin_day',
            'signature',
            'message',
            'message_from',
            ['class' => 'yii\grid\ActionColumn',
             'header' => "操作",
            ],
        ],
        'export' => false,
        'panel' => [
            'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-user"></i>'.Yii::t('user', 'User Infos').'</h3>',
            'type' => 'success',
            'before' => Html::a('<i class="glyphicon glyphicon-plus"></i>' .Yii::t('user', 'Create User Info'), ['create'], ['class' => 'btn btn-success']),
            'footer' => false,
            'after' => false
        ],
    ]); ?>
</div>
