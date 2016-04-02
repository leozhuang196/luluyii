<?php

use yii\helpers\Html;

$this->title = 'Permission Forms';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="permission-form-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Create Permission Form', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <ul>
    <?php foreach ($permissions as $permission):?>
    <li>
    <?php echo $permission->name;?>
    </li>
    <?php endforeach;?>
    </ul>
</div>
