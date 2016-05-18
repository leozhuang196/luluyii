<!-- ************************* 文件上传 ****************************** -->
<?php use yii\helpers\Html;use yii\widgets\ActiveForm;?>
<div>
    <?php $form = ActiveForm::begin([ 'options' => [ 'enctype' => 'multipart/form-data' ]]); ?>
    <?= $form->field($model, 'file')->fileInput()->label(false) ?>
    <div class="form-group"><?= Html::submitButton('上传', ['btn btn-primary']) ?></div>
    <?php ActiveForm::end(); ?>
</div>
  
<!-- **************************** assets ****************************** -->
<!-- 1、发布资源 -->
<?php //Yii::$app->getAssetManager()->publish会把web/images加载到web/assets/随机文件名中
list($assetPath,$assetUrl) = Yii::$app->getAssetManager()->publish('images');?>
<img src="<?=$assetUrl ?>/01.jpg" />
<!-- 2、在页面中写JS、CSS -->                       
<?php $cssString = ".gray-bg{color:red;}"; $this->registerCss($cssString);?>
<button id="mybutton">点我弹出OK</button>  
<?php $this->beginBlock('test') ?>  
    $(function($) {  
      $('#mybutton').click(function() {  
        alert('OK');  
      });  
    });  
<?php $this->endBlock() ?>  
<?php $this->registerJs($this->blocks['test'], \yii\web\View::POS_END); ?> 
<!-- 3、在页面中引入不是定义在全局里的JS、CSS -->
<?php //在AppAsset.php文件中加入函数
   /*  public static function addCss($view, $cssfile) {
        $view->registerCssFile($cssfile, [AppAsset::className(), "depends" => "app\assets\AppAsset"]);}} */
//在视图页面引入CSS
use app\assets\AppAsset; AppAsset::register($this); AppAsset::register($this,'css/media.css');?> 

<!-- **************************** 制作ico网站图标 ****************************** -->
<?php //利用http://www.bitbug.net/网站制作图标替换web/favicon.ico?>

<?= $form->field($model,'title')->textInput()->hint('Please enter your nick name instead of email')->label

(Post::getPostType($model->type).Yii::t('post', 'Title'));?>