<?php

use yii\db\Schema;
use yii\db\Migration;

class m150706_172641_create_order_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%order}}', [
            'id' => Schema::TYPE_PK,
            'client' => Schema::TYPE_STRING . '(100) NOT NULL',
            'total' => Schema::TYPE_FLOAT . ' NOT NULL',
            'encrypted_field' => 'BLOB NOT NULL'
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%order}}');
    }
}