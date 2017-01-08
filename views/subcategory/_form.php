<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Category;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Subcategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="subcategory-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <!-- <?php  //echo $form->field($model, 'category_id')->textInput() ?> -->
	<div class="form-group">
        <label class="control-label" for="subcategory-category_id">Category</label>
        <?= Html::activeDropDownList($model, 'category_id', ArrayHelper::map(Category::find()->all(), 'category_id', 'name'), ['class' => 'form-control']) ?>
    </div>
	

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
