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
                return  '../../'.$model->image;}],
            ['attribute' => 'sex',
            'value' => function ($model) {
                return UserInfo::getSex($model->sex);},
            "filter" => UserInfo::dropDown("sex")],
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
            'before' => Html::a('<i class="glyphicon glyphicon-plus"></i>' .Yii::t('user', 'Create'), ['create'], ['class' => 'btn btn-success']),
            'footer' => false,
            'after' => false
        ],
    ]); ?>
</div>