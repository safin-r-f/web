<?php

namespace app\controllers;

use Yii;
use app\models\Adv;
use app\modules\admin\models\AdvSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AdvController implements the CRUD actions for Adv model.
 */
class AdvController extends Controller
{
    public function actionItem($id)
    {
        // $model = Users::find()->all();
        $item = Adv::find()->where(['id' => $id])->one();

        return $this->render('item',['item' => $item]);


    }
}
