<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Engineer */

$this->title = 'Update Engineer: ' . $model->engineer_id;
$this->params['breadcrumbs'][] = ['label' => 'Engineers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->engineer_id, 'url' => ['view', 'id' => $model->engineer_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="engineer-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
