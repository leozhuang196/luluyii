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
            ['class' => '\kartik\grid\CheckboxColumn'],
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
            //'content',
            'created_time:datetime',
            ['class' => 'yii\grid\ActionColumn'],
        ],
        'toggleDataOptions'=>[
            'maxCount' => 200,//当超过200条时，此按钮隐藏，以免数据太多造成加载问题
            'minCount' => 10,//当现有总条数大于此值时,点击不会出现下方提示
            'confirmMsg' => '总共'. number_format($dataProvider->getTotalCount()).'条数据，确定要显示全部？',//点击时的确认
        ],
        'export' => false,
        'panel' => [
            'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i> ' .Yii::t('post', 'Post Manager') . '</h3>',
            'type' => 'success',
            'before' => Html::a('<i class="glyphicon glyphicon-book"></i>' .Yii::t('post', 'Create'), ['create'], ['class' => 'btn btn-success']),
            'footer' => false,
            'after' => false
        ],
        //{export}设置，可导出excel，csv，pdf等各种类型的文件
        'export'=>[
            'fontAwesome'=>'fa fa-share-square-o',//图标
            'target'=>'_blank',//在新标签打开
            'encoding'=>'gbk',//编码
        ],
        'exportConfig' => [
            GridView::CSV => [
                'label' => '导出CSV',
                'iconOptions' => ['class' => 'text-primary'],
                'showHeader' => true,
                'showPageSummary' => true,
                'showFooter' => true,
                'showCaption' => true,
                'filename' => '用户表'.date("Y-m-d"),
                'alertMsg' => '确定要导出CSV格式文件？',
                'options' => [
                    'title'=>'',
                ],
                'mime' => 'application/csv',
                'config' => [
                    'colDelimiter' => ",",
                    'rowDelimiter' => "\r\n",
                ],
            ],
        ],
    ]); ?>
</div>