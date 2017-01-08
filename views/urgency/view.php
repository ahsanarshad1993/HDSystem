<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Urgency */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Urgencies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="urgency-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->urgency_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->urgency_id], [
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
            'urgency_id',
            'name',
        ],
    ]) ?>

</div>
