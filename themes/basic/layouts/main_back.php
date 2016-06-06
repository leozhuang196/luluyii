<?php
use yii\helpers\Html;
use yii\bootstrap\Alert;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\bootstrap\Nav;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class='wrap'>
   <div class='panel panel-default sidebar'>
        <div class='panel-heading'>
            <h3 class='panel-title'><strong>后台管理</strong></h3>
        </div>
    	<?=Nav::widget([
                'options' => ['class'=>'nav nav-pills nav-stacked'],
                'items' => [
                    ['label' => '<span class="glyphicon glyphicon-shopping-cart"></span> '.Yii::t('shop', 'Shop Manager'),
                        'items' => [
                            ['label' => Yii::t('shop', 'Category Manager'),'url' => ['/shop/category']],
                            ['label' => Yii::t('shop', 'Stm Manager'),'url' => ['/shop/stm']],
                        ],
                    ],
                    ['label' => '<span class="glyphicon glyphicon-user"></span> '.Yii::t('user', 'User Manager'),
                        'items' => [
                            ['label' => Yii::t('user', 'User Manager'),'url' => ['/user/user']],
                            ['label' => Yii::t('user', 'UserInfo Manager'),'url' => ['/user/user-info']],
                            ['label' => Yii::t('user', 'Visit Manager'),'url' => ['/user/visit']],
                        ],
                    ],
                    ['label' => '<span class="glyphicon glyphicon-book"></span> '.Yii::t('post', 'Post Manager'),'url' => ['/post/post']],
                    ['label' => '<span class="glyphicon glyphicon-remove"></span> 调试',
                        'items' => [
                            ['label' => 'gii','url' => ['/gii']],
                            ['label' => 'debug','url' => ['/debug']],
                        ],
                    ],
                ],
                'encodeLabels' => false,
            ])?>
    </div>
	<?= $this->render('header')?>
	<div class="container">
        <?= Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],]) ?>
        <!-- 获取flash -->
        <?php
            if( Yii::$app->getSession()->hasFlash('success') ) {
                echo Alert::widget([
                    'options' => [
                        'class' => 'alert alert-success', //这里是提示框的class
                    ],
                    'body' => Yii::$app->getSession()->getFlash('success'), //消息体
                ]);
            }
            if( Yii::$app->getSession()->hasFlash('error') ) {
                echo Alert::widget([
                    'options' => [
                        'class' => 'alert alert-danger',
                    ],
                    'body' => Yii::$app->getSession()->getFlash('error'),
                ]) ;
            }
        ?>
        <div><?= $content;?></div>
    </div>
</div>
<?=$this->render('footer')?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>