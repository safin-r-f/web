<?php

namespace app\models;

use Yii;
use yii\base\Security;

/**
 * This is the model class for table "{{%users}}".
 *
 * @property integer $id
 * @property string $surname
 * @property string $name
 * @property string $second_name
 * @property string $email
 * @property string $phone_number
 * @property string $password
 */


class Users extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    public function setPassword($password)
    {
        //$this->password = sha1($password);
        //Security::generatePasswordHash($this->password);
        $this->password = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%users}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'email', 'phone_number', 'password'], 'required'],
            [['surname', 'name', 'second_name', 'email', 'phone_number', 'password'], 'string', 'max' => 255],
            [['is_admin'], 'filter', 'filter' => 'intval'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'id пользователя',
            'surname' => 'фамилия',
            'name' => 'имя',
            'second_name' => 'отчество',
            'email' => 'почта',
            'phone_number' => 'номер телефона',
            'password' => 'пароль',
            'is_admin' => 'является администратором',
        ];
    }

    /**
     * @inheritdoc
     * @return UsersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UsersQuery(get_called_class());
    }

    /**
     * @inheritdoc
     */
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

}