<?php

use yii\bootstrap\Html;
use yii\grid\GridView;

?>
<div class="admin-default-index">
    <h1><?= $this->context->action->uniqueId ?></h1>
    <p><?php
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                [
                'label' => 'название',
                'attribute' => 'label',
                'format' => 'raw',
                'value' => function ($data) {
                    return Html::label($data['label']);
                }
            ],
                [
                    'label' => 'ссылка',
                    'format' => 'raw',
                    'value' => function ($data) {
                        return Html::a(
                            'Перейти',
                            $data['url']);
                    }
                ],
            ]
        ])
        ?>

        <table class="table table-striped table-bordered">
        <tr>
            <td>Категории</td>
            <td>Количество объявлений</td>
            <td>Заголовки объявлений</td>
        </tr>
        <?php foreach ($AdminList->category as $category):?>
            <?php //поля объявлений?>
        <tr>
            <td><?=$category->title;?></td>
            <td><?=count($category->adv);?></td>
            <td>
                <?php foreach ($category->adv as $adv):?>
                    <?=$adv->title . "\n";?>
                <?php endforeach;?>
            </td>

        </tr>

        <?php endforeach;?>
        </table>




    </p>
</div>
