<?php

use yii\db\Migration;

class m160427_103115_create_post_table extends Migration
{
    public function up()
    {
        $this->createTable('{{%post}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'content_markdown' => $this->text(),
            'content_html' => $this->text(),
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%post}}');
    }
}
