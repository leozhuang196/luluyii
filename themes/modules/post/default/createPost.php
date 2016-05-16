<?php
$this->title = Yii::t('post', 'Create');
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('_form',['model'=>$model])?>