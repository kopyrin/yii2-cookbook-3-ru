<?php

use yii\db\Migration;

class m150829_145221_create_film_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%film}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(64)->notNull(),
            'release_year' => $this->integer(4)->notNull(),
        ], $tableOptions);

        $this->batchInsert('{{%film}}', ['id', 'title', 'release_year'], [
            [1, 'Interstellar', 2014],
            [2, "Harry Potter and the Philosopher's Stone", 2001],
            [3, 'Back to the Future', 1985],
            [4, 'Blade Runner', 1982],
            [5, 'Dallas Buyers Club', 2013],
        ]);
    }

    public function down()
    {
        $this->dropTable('film');
    }
}
