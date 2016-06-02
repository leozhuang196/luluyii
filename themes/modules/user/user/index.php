<?php
use yii\helpers\Html;
use kartik\grid\GridView;
use modules\user\models\User;
use yii\bootstrap\Modal;
use yii\helpers\Url;
$this->title = Yii::t('user', 'User Manager');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        /* 'caption' => $this->title,
        'captionOptions' => ['style' => 'font-size: 16px; font-weight: bold; color: #000; text-align: center;'], */
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'username',
            'email',
            'registration_ip',
             ['attribute' => 'created_at',
                'value' => function ($model) {
                 return User::getCreatdTime($model->created_at);
            }],
            ['class' => 'yii\grid\ActionColumn',
             'header' => "操作",
            ],
        ],
        'export' => false,
        'panel' => [
            'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-user"></i> ' .Yii::t('user', 'User Manager') . '</h3>',
            'type' => 'success',
            'before' => Html::a('<i class="glyphicon glyphicon-plus"></i>' .Yii::t('user', 'Create'), ['create'], [
                            //yii2中使用modal弹窗——'data-toggle' => 'modal'
                            //设置 data-target="#create-modal" 或 href="#create-modal" 来指定要切换的特定的模态框
                            'data-toggle' => 'modal','data-target' => '#create-modal','class' => 'btn btn-success'
                        ]),
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
<?php 
Modal::begin([
    'id' => 'create-modal',
    'header' => '<h4 class="modal-title">'.Yii::t('user', 'Create').'</h4>',
    'footer' => '<a href="#" class="btn btn-primary" data-dismiss="modal">关闭</a>',
]); 
$requestUrl = Url::toRoute('create');
$js = <<<JS
    $.get('{$requestUrl}', {},
        function (data) {
            $('.modal-body').html(data);
        }  
    );
JS;
$this->registerJs($js);
Modal::end(); 
?>