<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\modules\rbac\models\RoleForm */

$this->title = 'Create Role Form';
$this->params['breadcrumbs'][] = ['label' => 'Role Forms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="role-form-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'permissions' => $permissions,
    ]) ?>

</div>
