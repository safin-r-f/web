<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\AdminList;
use yii\bootstrap\Html;
use yii\data\ArrayDataProvider;
use app\modules\admin\components\Controller;
use Yii;



/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $menu = [
            ['label' => 'Объявления', 'url' => ['adv/index']],
            ['label' => 'Категории', 'url' => ['categories/index']],
            ['label' => 'Пользователи', 'url' => ['users/index']],
        ];

        $dataProvider = new ArrayDataProvider([
           'key'            => 'id',
            'allModels'     => $menu,
            'sort'          => [
                'attributes' => ['label', 'url'],
            ],
            'pagination'    => [
                'pageSize' => 10,
            ],
        ]);

        $AdminList = new AdminList();


        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'AdminList' => $AdminList,
        ]);
    }
}
