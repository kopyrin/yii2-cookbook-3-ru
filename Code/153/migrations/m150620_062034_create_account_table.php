<?php

use yii\db\Schema;
use yii\db\Migration;

class m150620_062034_create_account_table extends Migration
{
    const TABLE_NAME = '{{%account}}';

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable(self::TABLE_NAME, [
            'id' => Schema::TYPE_PK,
            'balance' => ' NUMERIC(15,2) DEFAULT NULL',
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable(self::TABLE_NAME);
    }
}
