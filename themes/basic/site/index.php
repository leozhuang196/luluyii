<?php
$this->title = \Yii::$app->params['siteName'];
?>
<div class='row'>
    <div class='col-md-9'>
    <?= $this->render('@themes/modules/post/default/index',['tutorial'=>$tutorial,'question'=>$question,'chat'=>$chat])?>
    </div>
</div>