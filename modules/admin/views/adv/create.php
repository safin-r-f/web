<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Adv */

$this->title = 'Create Adv';
$this->params['breadcrumbs'][] = ['label' => 'Advs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="adv-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
