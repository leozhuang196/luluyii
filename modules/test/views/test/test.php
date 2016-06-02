<?php
/* $message = 'hello';
//从父作用域继承变量
$example = function () use ($message){
    var_dump($message);
};
$example();

$example = function ($arg) use ($message) {
    var_dump($arg . ' ' . $message);
};
$example("hello"); */
?>
<form role="form">
  <div class="form-group">
    <select class="form-control"> 
      <option>1</option> 
      <option>2</option> 
      <option>3</option> 
      <option>4</option> 
      <option>5</option> 
      </select>
  </div>
  
  <div class="form-group">
      <select multiple class="form-control"> 
        <option>踢足球</option> 
        <option>游泳</option> 
        <option>踢足球</option> 
        <option>游泳</option> 
        <option>踢足球</option> 
        <option>游泳</option> 
        <option>踢足球</option> 
        <option>游泳</option> 
        <option>踢足球</option> 
        <option>游泳</option> 
        <option>踢足球</option> 
        <option>游泳</option> 
      </select>
  </div>
  
</form>  



<?php 
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\helpers\Url;
//创建一个按钮，用于调modal的显示
echo Html::a('创建', '#', [
    'id' => 'create',
    'data-toggle' => 'modal',
    'data-target' => '#create-modal',
    'class' => 'btn btn-success',
]);
//创建modal
Modal::begin([
    'id' => 'create-modal',
    'header' => '<h4 class="modal-title">创建</h4>',
    'footer' => '<a href="#" class="btn btn-primary" data-dismiss="modal">关闭</a>',
]);
$requestUrl = Url::toRoute('create');
$js = <<<JS
    $.get('{$requestUrl}', {},
        function (data) {
            $('.modal-body').html(data);
        }
    );
JS;
$this->registerJs($js);
Modal::end();
