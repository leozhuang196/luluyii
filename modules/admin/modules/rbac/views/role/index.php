<?php

use yii\helpers\Html;

$this->title = 'Role Forms';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="role-form-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Role Form', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <ul>
    <?php foreach ($roles as $role):?>
    <li>
    <a ><?php echo Html::a($role->name, ['update','id'=>$role->name])?></a>
    </li>
    <?php endforeach;?>
    </ul>
</div>
