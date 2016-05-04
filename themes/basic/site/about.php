<?php
use modules\admin\models\Config;
$this->title = '关于我们';
?>
<div class="site-about">
    <h3><?php echo Config::findOne(['`key`'=>'sys_site_description'])->value?></h3>
</div>