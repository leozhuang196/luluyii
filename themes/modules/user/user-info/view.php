<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
$this->title = $model->user_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('user', 'User Infos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-info-view">
    <p><?= Html::a(Yii::t('user', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?></p>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'user_id',
            'score',
            ['attribute' => 'sex',
                'value' => $model->getSex($model->sex),
            ],
            'qq',
            'birthday',
            'location',
        ],
    ]) ?>
</div>