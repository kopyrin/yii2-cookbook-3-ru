<?php

use yii\db\Migration;

class m160308_093234_create_article_table extends Migration
{
    public function up()
    {
        $this->createTable('{{%article}}', [
            'id' => $this->primaryKey(),
            'alias' => $this->string()->notNull(),
            'title' => $this->string()->notNull(),
            'text' => $this->text()->notNull(),
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%article}}');
    }
}
