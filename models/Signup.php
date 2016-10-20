<?php
namespace app\models;

use yii\base\Model;

class Signup extends Model
{
    public $email;
    public $password;
    public $name;
    public $surname;
    public $second_name;
    public $phone_number;

    public function rules()
    {
        return [
            [['name', 'email', 'phone_number', 'password'], 'required'],
            [['surname', 'name', 'second_name', 'email', 'phone_number'], 'string', 'max' => 255],
            ['email', 'email'],
            ['email', 'unique', 'targetClass'=>'app\models\Users'],
            ['password', 'string', 'min'=>2, 'max'=>10]
        ];
    }

    public function signup()
    {
        $user = new Users();
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->surname = $this->surname;
        $user->name = $this->name;
        //$user->second_name = $this->second_name;
        $user->phone_number = $this->phone_number;
        return $user->save();
    }
}