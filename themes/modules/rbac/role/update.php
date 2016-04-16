<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\modules\rbac\models\RoleForm */

$this->title = 'Update Role Form: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Role Forms', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->name]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="role-form-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'permissions' => $permissions,
    ]) ?>

</div>
