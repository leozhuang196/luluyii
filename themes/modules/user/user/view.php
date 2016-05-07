<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => Yii::t('user', 'Manager'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">
    <p>
        <?= Html::a('修改', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '确定删除这个用户吗？',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
            'email',
            'registration_ip',
            'created_at',
        ],
    ]) ?>
</div>