<?php

use yii\db\Migration;

/**
 * Handles the creation for table `categories`.
 */
class m160924_061543_create_categories_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%categories}}', [
            'id' => $this->primaryKey(),
			'title' => $this->string(255)->notNull()->comment('заголовок категории'),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%categories}}');
    }
}
