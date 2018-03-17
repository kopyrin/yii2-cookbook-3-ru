<?php

use yii\db\Migration;
use \app\models\Account;

class m150620_063252_add_account_records extends Migration
{
    public function up()
    {
        $accountFirst = new Account();
        $accountFirst->balance = 1110;
        $accountFirst->save();

        $accountSecond = new Account();
        $accountSecond->balance = 779;
        $accountSecond->save();

        $accountThird = new Account();
        $accountThird->balance = 568;
        $accountThird->save();
        return true;
    }

    public function down()
    {
        $this->truncateTable('{{%account}}');
        return false;
    }

}
