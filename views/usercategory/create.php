<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Usercategory */

$this->title = 'Create Usercategory';
$this->params['breadcrumbs'][] = ['label' => 'Usercategories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usercategory-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
