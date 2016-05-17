<?php
use yii\grid\GridView;
$this->title = Yii::t('user', 'User Info');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-info-index">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'user_id',
            'sex',
            'score',
            'signature',
            'qq',
            'birthday',
            'location',
            'image',
            'signin_day',
            ['class' => 'yii\grid\ActionColumn',
             'template' => '{view} {update} ',
            ],
        ],
    ]); ?>
</div>