<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use modules\user\models\User;
use modules\user\models\UserInfo;
$this->title = $model->title;
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
					<span><i class='fa fa-star-o'></i><?= $model->collection?></span>
					<span class='pull-right'>
						<i class='fa fa-thumbs-o-up'></i><?= $model->love_num?>
						<i class='fa fa-thumbs-o-down'></i><?= $model->hate_num?>
					</span>
            	</div>
            	<?= $model->content?>	
            </div>
        </div>
        <div class='panel panel-default'>
            <div class='panel-heading'><?=Html::encode('评论')?></div>
            <div class='panel-body'>
            	<?php $form = ActiveForm::begin(['id'=>'commentForm']);?>
            		<?= $form->field($model,'id')->textarea();?>
            		<?=Html::submitButton('发表',['class'=>'btn btn-primary'])?>
            	<?php ActiveForm::end();?>	
            </div>
        </div>
    </div>
    <div class='col-md-3'>
    <?= Html::a('<i class="fa fa-plus"></i> '.Yii::t('post', 'Create'),['create-post'],['class'=>'btn btn-success btn-block'])?>
    <?php if (User::getUser()['username'] == $model->author):?>
    <?= Html::a('<i class="fa fa-edit"></i> '.Yii::t('post', 'Update'),['update-post','id'=>$model->id],['class'=>'btn btn-primary btn-block'])?>
    <?php endif;?>
    <p></p>
    <?= $this->render('@themes/modules/user/default/show',
        ['user' => User::findOne(['username'=>$model->author]),
         'user_info' => UserInfo::findOne(['user_id'=>$model->user_id])
    ]);?>
    </div>
</div>