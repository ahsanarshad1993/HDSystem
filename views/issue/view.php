<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Issue */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Issues', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="issue-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'issue_id' => $model->issue_id, 'engineer_id' => $model->engineer_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'issue_id' => $model->issue_id, 'engineer_id' => $model->engineer_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'issue_id',
            'title',
            'description',
            'user_id',
            'engineer_id',
            'subcategory_id',
            'status_id',
            'create_time',
            'urgency',
            'attachment',
        ],
    ]) ?>

</div>
