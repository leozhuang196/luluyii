<?php
use yii\helpers\Html;
use yii\grid\GridView;
$this->title = Yii::t('user', 'User Info');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-info-index">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'user_id',
            'sex',
            'qq',
            'birthday',
            'location',
            ['class' => 'yii\grid\ActionColumn',
             'template' => '{view} {update} ',
            ],
        ],
    ]); ?>

</div>
