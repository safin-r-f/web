<?php

use yii\db\Migration;

class m161004_155640_add_admin_user extends Migration
{
    public function up()
    {
        $user = new \app\models\Users;
        $user->attributes = [
            'surname'=>'Иванов',
            'name' => 'Иван',
            'second_name' => 'Иванович',
            'email' => 'ivan@test.ru',
            'phone_number' => '123123',
            'password' => \Yii::$app
                ->getSecurity()
                ->generatePasswordHash('password'),
        ];
        $user->save();
    }

    public function down()
    {
        $model = \app\models\Users::find()->byEmail('ivan@test.ru')->one();
        if($model) $model->delete();
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
