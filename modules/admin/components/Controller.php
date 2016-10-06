<?php

namespace app\modules\admin\components;

use yii\filters\AccessControl;

/**
 * Базовый контроллер административной части
 */
class Controller extends \yii\web\Controller
{
    /**
     * Закрываем контроллер от неавторизованных юзеров
     */
    public function behaviors ()
    {
        //получаем поведения, определенные в классе-родителе
        $return = parent::behaviors();
        //определяем свои поведения
        $behaviors = [
            //контролирует доступ к экшенам контроллера
            'access' => [
                //класс фильтра для доступа
                'class' => AccessControl::className(),
                //правила для доступа
                'rules' => [
                    [
                        'allow' => true,
                        //@ означает только авторизованных пользователей
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
        //сливаем два массива в один и возвращаем
        return array_merge($return, $behaviors);
    }
}