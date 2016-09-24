<?php

use yii\db\Migration;

/**
 * Handles the creation for table `users`.
 */
class m160924_050707_create_users_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%users}}', [
            'id' => $this->primaryKey()->comment('id пользователя'),
			'surname' => $this->string(255)->notNull()->comment('фамилия'),
			'name' => $this->string(255)->notNull()->comment('имя'),
			'second_name' => $this->string(255)->notNull()->comment('отчество'),
			'email' => $this->string(255)->notNull()->comment('почта'),
			'phone_number' => $this->string(255)->notNull()->comment('номер телефона'),
			'password' => $this->string(255)->notNull()->comment('пароль'),
        ], 'ENGINE=InnoDb DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT \'Таблица пользователей\'');
 	
	$this->createIndex('email_index', '{{%users}}', 'email');
}

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%users}}');
    }
}
