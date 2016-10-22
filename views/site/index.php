<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use app\models\Categories;
use app\models\Users;
use yii\i18n\Formatter;
use yii\base\Component;
use yii\base\Object;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <!--<div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>-->

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
                            <div class="row">
                                <div class="col-md-3" align="center">
                                    <?php if (!empty($quest->image)):?>
                                        <a href="<?php echo Url::to(['adv/item', 'id' => $quest->id]);?>">
                                            <img src="<?php echo Html::encode($quest->image); ?> " height="128" /></a>
                                    <?php endif?>
                                </div>
                                <div class="col-md-8">
                                    <a href="<?php echo Url::to(['adv/item', 'id' => $quest->id]);?>">
                                    <?php echo Html::encode($quest->title); ?></a><br>
                                    <?php echo "Цена: " . Yii::$app->formatter->asCurrency($quest->price, null, [
                                        \NumberFormatter::MAX_FRACTION_DIGITS => 0,
                                    ]);
                                    //echo Html::encode($quest->price); ?><br>
                                    <?php echo "Дата размещения: " . Yii::$app->formatter->asDate($quest->date_public);
                                       // echo Html::encode($quest->date_public); ?><br>
                                    <?php echo "Категория: " . Html::encode($quest->category->title); ?>
                                </div>

                                <?php if ($quest->creator == \Yii::$app->user->id): ?>

                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <?= Html::a("Изменить объявление", ['adv/update', 'id'=>$quest->id]) ?>
                                        </div>
                                    </div>
                                <?php endif?>

                            </div>
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
