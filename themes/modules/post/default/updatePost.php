<?php
use modules\post\models\post;
$this->title = Yii::t('post', 'Update');
$this->params['breadcrumbs'][] = ['label'=>Post::getPostType($model->type),'url'=>['show-posts','type'=>$model->type]];
$this->params['breadcrumbs'][] = ['label'=>$model->title,'url'=>['show-post','id'=>$model->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('_form',['model'=>$model])?>
