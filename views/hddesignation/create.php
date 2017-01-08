<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Hddesignation */

$this->title = 'Create Hddesignation';
$this->params['breadcrumbs'][] = ['label' => 'Hddesignations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hddesignation-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
