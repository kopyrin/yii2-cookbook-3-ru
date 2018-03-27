<?php

use yii\db\Migration;

class m150915_072653_create_user_allowance_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%user_allowance}}', [
            'user_id' => $this->primaryKey(),
            'allowed_number_requests' => $this->integer(10)->notNull(),
            'last_check_time' => $this->integer(10)->notNull()
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%user_allowance}}');
    }

}
