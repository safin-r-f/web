<?php

namespace app\controllers;

use Yii;
use app\models\Adv;
use app\models\Users;
use app\modules\admin\models\AdvSearch;
use yii\web\Controller;
use yii\web\HttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
use app\models\UploadForm;
use yii\imagine\Image;


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
                    Image::thumbnail($model->foto, null, 128)
                        ->save(('thumbs/'.$model->foto), ['quality' => 100]);
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
                    Image::thumbnail($model->foto, 128, 128)
                        ->save(('thumbs/'.$model->foto), ['quality' => 100]);
                }
                return $this->redirect('/');
            }
        }
        return $this->render('create', ['model'=>$model]);
    }


    public function actionMyadv()
    {
        // $model = Users::find()->all();
        $list_adv = Adv::find()->where(['creator' => Yii::$app->user->id])->all();
        //$list_myadv = Adv::find()->byCreator($this->id);
        $list_users = Users::find()->all();

        return $this->render('myadv',['list_adv' => $list_adv, 'list_users' => $list_users]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['/']);
    }
    public function actionDeletemyadv($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['adv/myadv']);
    }
    protected function findModel($id)
    {
        if (($model = Adv::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionItem($id)
    {
        // $model = Users::find()->all();
        $item = Adv::find()->where(['id' => $id])->one();

        return $this->render('item',['item' => $item]);
    }
}
