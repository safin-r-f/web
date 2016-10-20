<h1>Регистрация</h1>
<?php
use \yii\widgets\ActiveForm;
?>

<?php
    $form = ActiveForm::begin(['class'=>'form-horizontal']);
?>

<?= $form->field($model, 'email')->textInput(['autofocus'=>true]) ?>

<?= $form->field($model, 'password')->passwordInput()->label('Пароль') ?>

<?= $form->field($model, 'name')->textInput(['autofocus'=>true])->label('Имя') ?>

<?php  echo $form->field($model, 'surname')->textInput(['autofocus'=>true])->label('Фамилия') ?>

<?php // echo $form->field($model, 'second_name')->textInput(['autofocus'=>true]) ?>

<?= $form->field($model, 'phone_number')->textInput(['autofocus'=>true])->label('Номер телефона') ?>

<div>
    <button type="submit" class="btn btn-primary">Submit</button>
</div>

<?php
    ActiveForm::end();
?>
