<?php
use yii\helpers\Html;
?>
<div class="stm-img-form">
    <div class="form-group">
    	<label class="control-label"><?= Yii::t('shop', 'Stm Title')?></label>
        <?= Html::input('input', 'title', '', ['class' => 'form-control'])?>
        <label class="control-label"><?= Yii::t('shop', 'Stm Img')?></label>
        <?= Html::input('input', 'pic', '', ['class' => 'form-control'])?>
    </div>
</div>
