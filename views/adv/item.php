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
            'id',
            'title',
            'price',
            [
                'attribute'  => 'image',
                'value'  => $item->image ? Html::img($item->image) : '',
                'format' => 'raw',
            ],
            'date_public:date',
            'description:ntext',
            'address:ntext',
            'phone_number',
            'email:email',
            'id_category',
            'creator',
        ],
    ]) ?>
    <code><?= __FILE__ ?></code>
</div>

