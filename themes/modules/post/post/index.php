<?php
use yii\helpers\Html;
use yii\grid\GridView;
$this->title = Yii::t('post', 'Posts');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p>
        <?= Html::a(Yii::t('post', 'Create Post'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'user_id',
            'author',
            'love_num',
            'hate_num',
            'comment_num',
            'view_num',
            'collection',
            'content',
            'type',
            'description',
            'created_time:datetime',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>