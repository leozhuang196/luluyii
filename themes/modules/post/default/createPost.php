<?php
use modules\post\models\Post;
$this->title = Yii::t('post', 'Create').Post::getPostType($model->type);
$this->params['breadcrumbs'][] = ['label'=>Post::getPostType($model->type),'url'=>['/post/default/show-posts','type'=>$model->type]];
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('_form',['model'=>$model])?>
