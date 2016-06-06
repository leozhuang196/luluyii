<?php 
use yii\helpers\Url;

?>
<footer class="footer">
	<div class="container">
    	<div class='row'>
    		<div class='col-lg-3'>
    			<dt>相关合作</dt>
    			<dd><a href="<?= Url::to(['/site/contact'])?>">联系我们</a></dd>
    		</div>
    		<div class='col-lg-3'>
    			<dt>网站信息</dt>
    			<dd><a href="<?= Url::to(['/site/diary'])?>">成长日记</a></dd>
    		</div>
    		<div class='col-lg-3'>
    			<dt>关注我们</dt>
    			<dd><a href="<?= Url::to(['/site/bug'])?>">bug修复</a></dd>
    		</div>
    		<div class='col-lg-3'>
    			<dt>技术采用</dt>
    			<dd><?= Yii::powered() ?> <?= Yii::getVersion() ?></dd>
            </div>
        </div>
        <!-- <div class='row'>
        	<div class='col-sm-12 col-sm-offset-4'>
        		<span>Copyright © 鲁鲁槟</span>
        	</div>
        </div> -->
	</div>
</footer>