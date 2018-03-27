<?php

class m160201_102003_create_customer_collection extends \yii\mongodb\Migration
{
    public function up()
    {
        $this->createCollection('customer');
    }

    public function down()
    {
        $this->dropCollection('customer');
    }
}
