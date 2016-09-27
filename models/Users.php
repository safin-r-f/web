<?php

namespace app\models;

use Yii;

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
class Users extends \yii\db\ActiveRecord
{
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
            [['surname', 'name', 'second_name', 'email', 'phone_number', 'password'], 'required'],
            [['surname', 'name', 'second_name', 'email', 'phone_number', 'password'], 'string', 'max' => 255],
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
}
