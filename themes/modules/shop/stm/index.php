<?php
use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\grid\BooleanColumn;
use modules\shop\models\Stm;
$this->title = Yii::t('shop', 'Stm');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stm-index">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
    			'class'=>BooleanColumn::className(),
    			'attribute'=>'is_use',
    			'trueLabel'=>'启用',
    			'falseLabel'=>'停用'
        	],
            [
                'attribute'=>'stm_type',
                'value'=> function ($model){
                    return Yii::$app->params['luluyiiGlobal']['locations'][$model->stm_type];
                }, 
                'filter'=>Yii::$app->params['luluyiiGlobal']['locations']
        	],
        	[
        	    'attribute' => 'stmImgs.title',
        	    'format'=>'raw',
        	    'value' => function($model){
        	       return $model->stmImgs['title'];
                }
        	],
        	[
            	'attribute' => 'stmImgs.pic',
            	'format'=>'raw',
            	'value' => function($model){
            	   return Html::img(Yii::$app->params['imageDomain'].'/'.$model->stmImgs['pic']) ;
            	}
        	],
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => "操作",
            ],
        ],
        'export' => false,
        'panel' => [
            'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i> ' .Yii::t('shop', 'Stm Manager') . '</h3>',
            'type' => 'success',
            'before' => Html::a('<i class="glyphicon glyphicon-plus"></i>' .Yii::t('shop', 'Create Stm'), ['create'], ['class' => 'btn btn-success']),
            'footer' => false,
            'after' => false
        ],
    ]); ?>
</div>