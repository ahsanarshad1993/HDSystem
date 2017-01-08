<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Issue */

$this->title = 'Update Issue: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Issues', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'issue_id' => $model->issue_id, 'engineer_id' => $model->engineer_id, 'user_id' => $model->user_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="issue-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
