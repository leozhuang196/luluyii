<?php
use yii\base\AreaDecorator;
use yii\widgets\Block;
?>

<?php AreaDecorator::begin(['viewFile'=>'@app/views/layouts/columns_2.php'])?>

        <?php  Block::begin(['id' =>'mainData']);?>
                <div class="main_column_left">
                        <div>main column left data</div>
                </div>
                <div class="main_column_right">
                        <div><?= $content ?></div>
                </div>
        <?php Block::end();?>

        <?php Block::begin(['id' =>'sideData']);?>
                <div class="side_column">
                        side data
                </div>
        <?php Block::end();?>

<?php AreaDecorator::end();?>