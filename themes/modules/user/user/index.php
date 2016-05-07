<?php
use yii\helpers\Html;
use yii\grid\GridView;
$this->title = '管理用户';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p><?= Html::a('创建用户', ['create'], ['class' => 'btn btn-success']) ?></p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'caption' => $this->title,
        'captionOptions' => ['style' => 'font-size: 16px; font-weight: bold; color: #000; text-align: center;'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'username',
            'email',
            'registration_ip',
             ['attribute' => 'created_at',
                'value' => function ($model) {
                 return date('Y-m-d G:i:s', $model->created_at);
            }],
            ['class' => 'yii\grid\ActionColumn',
             'header' => "操作",
            ],
        ],
    ]); ?>
</div>