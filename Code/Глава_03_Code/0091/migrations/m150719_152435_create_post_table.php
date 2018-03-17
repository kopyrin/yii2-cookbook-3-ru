<?php

use yii\db\Schema;
use yii\db\Migration;

class m150719_152435_create_post_table extends Migration
{
    const TABLE_NAME = '{{%post}}';

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable(self::TABLE_NAME, [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING.'(255) NOT NULL',
            'content' => Schema::TYPE_TEXT.' NOT NULL',
        ], $tableOptions);

        for ($i = 1; $i < 7; $i++) {
            $this->insert(self::TABLE_NAME, [
                'title' => 'Test article #'.$i,
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. '
                            .'Sed sit amet mauris est. Sed at dignissim dui. '
                            .'Phasellus arcu massa, facilisis a fringilla sit amet, '
                            .'rhoncus ut enim.',
            ]);
        }
    }

    public function down()
    {
        $this->dropTable(self::TABLE_NAME);
    }
}
