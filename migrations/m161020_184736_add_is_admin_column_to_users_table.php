<?php

use yii\db\Migration;

/**
 * Handles adding is_admin to table `users`.
 */
class m161020_184736_add_is_admin_column_to_users_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('users', 'is_admin', $this->integer());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%users}}');
    }
}
