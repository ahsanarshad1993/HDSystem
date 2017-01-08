<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Hddesignation */

$this->title = 'Update Hddesignation: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Hddesignations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->hd_designation_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="hddesignation-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
