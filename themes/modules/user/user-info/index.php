<?php
use kartik\grid\GridView;
use yii\helpers\Html;
use modules\user\models\User;
use modules\user\models\UserInfo;
$this->title = Yii::t('user', 'User Info');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-info-index">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => '\kartik\grid\CheckboxColumn'],
            ['class' => 'yii\grid\SerialColumn'],
            'user_id',
            ['attribute' => 'user_id',
             'header'=>Yii::t('user', 'Username'),
            'value' => function ($model) {
                return User::findOne(['id'=>$model->user_id])->username;}],
            ['attribute' => 'image',
            'format' => [
                'image',
                ["width"=>"40",
                    "height"=>"40"
                ]],
                'value' => function ($model){
                return  Yii::$app->params['imageDomain'].'/'.$model->image;}],
            ['attribute' => 'sex',
            'value' => function ($model) {
                return UserInfo::getSex($model->sex);},
            "filter" => Yii::$app->params['luluyiiGlobal']['sex']],
            //"filter" => UserInfo::dropDown("sex")],
            'score',
            'signature',
            ['attribute' => 'qq',
            'class'=>'kartik\grid\EditableColumn'],
            'birthday',
            'location',
            'signin_day',
            ['class' => 'yii\grid\ActionColumn',
             'template' => '{view} {update} ',
             'header' => "操作",
            ],
        ],
        'export' => false,
        'panel' => [
            'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-user"></i> ' .Yii::t('user', 'UserInfo Manager') . '</h3>',
            'type' => 'success',
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