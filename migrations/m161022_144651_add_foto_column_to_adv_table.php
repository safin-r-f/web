<?php

use yii\db\Migration;

/**
 * Handles adding foto to table `adv`.
 */
class m161022_144651_add_foto_column_to_adv_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('adv', 'foto', $this->string(255)->notNull()->comment('Изображение'));
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('adv', 'foto');
    }
}
