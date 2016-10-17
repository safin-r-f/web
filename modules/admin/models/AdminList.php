<?php
/**
 * Created by PhpStorm.
 * User: Ramil
 * Date: 08.10.2016
 * Time: 11:07
 */

namespace app\modules\admin\models;

use app\models\Categories;
use Yii;
use yii\base\Model;
use app\models\Adv;


class AdminList extends Model implements \yii\web\IdentityInterface
{
    public function getAdv()
    {
        return Adv::find()->all();
    }
    public function getCategory()
    {
        return Categories::find()->all();
    }


    // Тест начало
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }
    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return null;
    }
    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::find()->byEmail($username)->one();
    }
    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return null;
    }
    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return false;
    }
    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->getSecurity()->validatePassword($password, $this->password);
    }
    // Тест конец
}