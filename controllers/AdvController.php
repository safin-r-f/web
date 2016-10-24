<?php

namespace app\controllers;

use Yii;
use app\models\Adv;
use app\modules\admin\models\AdvSearch;
use yii\web\Controller;
use yii\web\HttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
use app\models\UploadForm;

/**
 * AdvController implements the CRUD actions for Adv model.
 */
class AdvController extends Controller
{
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
                'only' => ['create', 'update'],
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

    /*
    public function actionUpdate ($id)
    {
        $model = Adv::findOne($id);
        if (!$model || $model->creator != Yii::$app->user->id)
        {
            throw new HttpException(404);
        }
        if ($model->load(\Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['site/index']);
        }

        return $this->render('update', ['model'=>$model]);
    }*/

    public function actionUpdate ($id)
    {
        $model = Adv::findOne($id);
        if (!$model || $model->creator != Yii::$app->user->id)
        {
            throw new HttpException(404);
        }
        if($model->load(Yii::$app->request->post())) {
            $model->file = UploadedFile::getInstance($model, 'file');
            if ($model->file) {
                $imagepath = 'uploads/';
                $model->foto = $imagepath .rand(10, 100).$model->file->name;
            }
            if ($model->save()) {
                if ($model->file && $model->validate()) {
                    $model->file->saveAs($model->foto);
                }
                return $this->redirect('/');
            }
        }
        return $this->render('update', ['model'=>$model]);
    }

    /* базовая версия до foto
    public function actionCreate()
    {
        $model = new Adv();
        if ($model->load(\Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['site/index']);
        }

        return $this->render('create', ['model'=>$model]);

    }*/
    //foto
    public function actionCreate()
    {
        $model = new Adv();
        if($model->load(Yii::$app->request->post())) {
            $model->file = UploadedFile::getInstance($model, 'file');
            if ($model->file) {
                $imagepath = 'uploads/';
                $model->foto = $imagepath .rand(10, 100).$model->file->name;
            }
            if ($model->save()) {
                if ($model->file && $model->validate()) {
                    $model->file->saveAs($model->foto);
                }
                return $this->redirect('/');
            }
        }
        return $this->render('create', ['model'=>$model]);
    }


    public function actionItem($id)
    {
        // $model = Users::find()->all();
        $item = Adv::find()->where(['id' => $id])->one();

        return $this->render('item',['item' => $item]);


    }
}
