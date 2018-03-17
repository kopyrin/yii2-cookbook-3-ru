<?php

use yii\db\Schema;
use yii\db\Migration;

class m150706_171049_create_user_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user}}', [
            'id' => Schema::TYPE_PK,
            'username' => Schema::TYPE_STRING . '(100) NOT NULL',
            'password_hash' => Schema::TYPE_STRING . '(32) NOT NULL'
        ], $tableOptions);

        $this->insert('{{%user}}', [
            'username' => 'Alex',
            'password_hash' => '202cb962ac59075b964b07152d234b70'
        ]);

        $this->insert('{{%user}}', [
            'username' => 'Qiang',
            'password_hash' => '202cb962ac59075b964b07152d234b70'
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%user}}');
    }
}
