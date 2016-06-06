<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use modules\user\models\User;
use modules\user\models\UserInfo;
use modules\post\models\Post;
use modules\post\models\PostCollection;
$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label'=>Post::getPostType($model->type),'url'=>['/post/default/show-posts','type'=>$model->type]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class='row'>
    <div class='col-md-9'>
        <div class='panel panel-default'>
            <div class='panel-body'>
            	<div class='action'>
					<span><i class='fa fa-user'></i><?= $model->author;?></span>
					<span><i class='fa fa-clock-o'></i><?= date('Y-m-d H:m',$model->created_time)?></span>
					<span><i class='fa fa-eye'></i><?= $model->view_num?></span>
					<span><i class='fa fa-comments-o'></i><?= $model->comment_num?></span>
					<span class='pull-right'>
						<span>
						<?php if (PostCollection::exitCollect($model->id)):?>
							<?= Html::a("<i class='fa fa-star-o active'></i>",['/post/default/no-collect','id'=>$model->id],['title'=>'取消收藏'])?>
						<?php else:?>
							<?= Html::a("<i class='fa fa-star-o'></i>",['/post/default/collect','id'=>$model->id],['title'=>'收藏'])?>
						<?php endif;?>
							<?= $model->collection?>
						</span>
						<span><i class='fa fa-thumbs-o-up'></i><?= $model->love_num?></span>
						<span><i class='fa fa-thumbs-o-down'></i><?= $model->hate_num?></span>
					</span>
            	</div>
            	<?= $model->content?>	
            </div>
        </div>
    </div>
    <div class='col-md-3'>
    <?= Html::a('<i class="fa fa-plus"></i> '.Yii::t('post', 'Create Post').Post::getPostType($model->type),['create-post','type'=>$model->type],['class'=>'btn btn-success btn-block'])?>
    <?php if (User::getUser()['username'] == $model->author):?>
    <?= Html::a('<i class="fa fa-edit"></i> '.Yii::t('post', 'Update Post').Post::getPostType($model->type),['update-post','id'=>$model->id],['class'=>'btn btn-primary btn-block'])?>
    <?php endif;?>
    <p></p>
    <?= $this->render('@themes/modules/user/default/show',
        ['user' => User::findOne(['username'=>$model->author]),
         'user_info' => UserInfo::findOne(['user_id'=>$model->user_id])
    ]);?>
    </div>
</div>
