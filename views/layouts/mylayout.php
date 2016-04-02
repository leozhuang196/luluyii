<!-- 布局文件的嵌套功能 -->
<!-- 指定使用的布局文件为main.php -->
<?php $this->beginContent('@app/views/layouts/main.php'); ?>

<div style="float: left">left</div>
<div style="float: right"> <?php echo $content;?> </div>

<?php $this->endContent(); ?>