<?php

use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>

    <div class="body-content">

        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">Объявления</div>
            <?php if (empty($list_adv)): ?>
                <div class="panel-body">
                    <p>Объявлений не найдено</p>
                </div>
            <?php else: ?>
                <!-- List group -->
                <ul class="list-group">
                    <?php foreach ($list_adv as $key => $quest): ?>
                        <li class="list-group-item">
                            <?php echo Html::encode($quest->title); ?>:
                            <?php echo Html::encode($quest->description); ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>

                <div class="panel-heading">Пользователи</div>
                <?php if (empty($list_users)): ?>
                    <div class="panel-body">
                        <p>Пользователей не найдено</p>
                    </div>
                <?php else: ?>
                    <!-- List group -->
                    <ul class="list-group">
                        <?php foreach ($list_users as $key => $quest): ?>
                            <li class="list-group-item">
                                <?php echo Html::encode($quest->name); ?>:
                                <?php echo Html::encode($quest->phone_number); ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>

    </div>
</div>
