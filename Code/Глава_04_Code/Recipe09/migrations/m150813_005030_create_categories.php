<?php

use yii\db\Schema;
use yii\db\Migration;

class m150813_005030_create_categories extends Migration
{
    public function up()
    {
        $tableOptions = null;

        $this->createTable('{{%product}}', [
            'id' => Schema::TYPE_PK,
            'category_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'sub_category_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'title' => Schema::TYPE_STRING . ' NOT NULL',
        ], $tableOptions);

        $this->createTable('{{%category}}', [
            'id' => Schema::TYPE_PK,
            'category_id' => Schema::TYPE_INTEGER,
            'title' => Schema::TYPE_STRING . ' NOT NULL',
        ], $tableOptions);


        $this->addForeignKey('fk_product_category_id', '{{%product}}', 'category_id', '{{%category}}', 'id');
        $this->addForeignKey('fk_product_sub_category_id', '{{%product}}', 'category_id', '{{%category}}', 'id');

        $this->batchInsert('{{%category}}', ['id', 'title'], [
            [1, 'TV, Audio/Video'],
            [2, 'Photo'],
            [3, 'Video']
        ]);

        $this->batchInsert('{{%category}}', ['category_id', 'title'], [
            [1, 'TV'],
            [1, 'Acoustic System'],

            [2, 'Cameras'],
            [2, 'Flashes and Lenses '],

            [3, 'Video Cams'],
            [3, 'Action Cams'],
            [3, 'Accessories']
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%product}}');
        $this->dropTable('{{%category}}');

    }
}
