<?php

use yii\db\Migration;

/**
 * Handles the creation for table `adv`.
 */
class m160924_052820_create_adv_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%adv}}', [
            'id' => $this->primaryKey()->comment('id объявления'),
			'title' => $this->string(255)->notNull()->comment('заголовок объявления'),
			'price' => $this->float(10)->notNull()->unsigned()->comment('цена'),
			'image' => $this->string(255)->notNull()->comment('картинка'),
			'date_public' => $this->dateTime()->notNull()->comment('дата размещения'),
			'description' => $this->text()->comment('описание'),
			'address' => $this->text()->comment('адрес'),
			'phone_number' => $this->string(255)->notNull()->comment('номер телефона в объявлении'),
			'email' => $this->string(255)->notNull()->comment('почта в объявлении'),
			'id_category' => $this->integer()->notNull()->unsigned()->comment('id категории'),
			'creator' => $this->integer()->notNull()->unsigned()->comment('создатель объявления'),
        ], 'ENGINE=InnoDb DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT \'Таблица с объявлениями\'');
		
		$this->createIndex('creator_index', '{{%adv}}', 'creator');
		$this->createIndex('id_category_index', '{{%adv}}', 'id_category');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%adv}}');
    }
}
