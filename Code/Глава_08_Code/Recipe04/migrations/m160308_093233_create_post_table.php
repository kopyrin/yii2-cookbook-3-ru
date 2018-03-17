<?php

use yii\db\Migration;

class m160308_093233_create_post_table extends Migration
{
    public function up()
    {
        $this->createTable('{{%post}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'text' => $this->text()->notNull(),
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%post}}');
    }
}
