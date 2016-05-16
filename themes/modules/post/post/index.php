<?php
use yii\helpers\Html;
use yii\grid\GridView;
$this->title = Yii::t('post', 'Posts');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">
    <p><?= Html::a("<i class='fa fa-plus'></i> ".Yii::t('post', 'Create'), ['create'], ['class' => 'btn btn-success']) ?></p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'user_id',
            'author',
            'title',
            'type',
            'love_num',
            'hate_num',
            'comment_num',
            'view_num',
            'collection',
            'content',
            'created_time:datetime',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>