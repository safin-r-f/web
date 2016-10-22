<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Categories;
use app\models\Users;

$categories = ArrayHelper::map(Categories::find()->all(), 'id', 'title');
$users = ArrayHelper::map(Users::find()->all(), 'id', 'name');

// echo $form->field($model, 'id_category')->dropDownList(
//    $categories,
//    ['multiple' => 'multiple']
//);



/* @var $this yii\web\View */
/* @var $model app\models\Adv */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="adv-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'date_public')->textInput() ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'address')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_category')->dropDownList($categories) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
