<?php
use yii\helpers\Html;
use kartik\grid\GridView;
$this->title = Yii::t('post', 'Posts');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">
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
        'export' => false,
        'panel' => [
            'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i> ' .Yii::t('post', 'Post Manager') . '</h3>',
            'type' => 'success',
            'before' => Html::a('<i class="glyphicon glyphicon-book"></i>' .Yii::t('post', 'Create'), ['create'], ['class' => 'btn btn-success']),
            'footer' => false,
            'after' => false
        ],
    ]); ?>
</div>