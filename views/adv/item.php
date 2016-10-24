<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\DetailView;

?>

<div>
    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $item,
        'attributes' => [
            //'id',
            'title',
            //'foto:image',
            [
                'attribute'  => 'foto',
                'value'  => '../' . $item->foto,
                'format' => ['image', ['height'=>'500']],
            ],
            /*[
                'attribute'  => 'image',
                'value'  => $item->image ? Html::img($item->image) : '',
                'format' => 'raw',
            ],*/
            'price',
            [
                'attribute'  => users,
                'label' => 'Продавец',
                'value'  => $item->users->name . ' ' . $item->users->surname,
            ],
            'date_public:date',
            'phone_number',
            //'email:email',
            [
                'attribute'  => email,
                'value'  => !empty($item->email) ? $item->email : 'не указан',
            ],
            //'address:ntext',
            [
                'attribute'  => address,
                'value'  => !empty($item->address) ? $item->address : 'не указан',
            ],
            [
                'attribute'  => category,
                'label' => 'Категория',
                'value'  => $item->category->title,
            ],
            'description:ntext',

        ],
    ]) ?>

</div>

