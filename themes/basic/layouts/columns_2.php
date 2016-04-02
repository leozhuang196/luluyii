<?php
use yii\base\AreaDecorator;
use yii\widgets\Block;
?>

<?php AreaDecorator::begin(['viewFile'=>'@app/views/layouts/columns_1.php'])?>

        <?php Block::begin(['id' =>'content']);?>
                <div class="main_column">
                        <?= $mainData ?>
                </div>
                <div class="side_column">
                        <?= $sideData ?>
                </div>
        <?php Block::end();?>

        <?php Block::begin(['id' =>'footer']);?>
                <div>footer data </div>
        <?php Block::end();?>

<?php AreaDecorator::end();?>