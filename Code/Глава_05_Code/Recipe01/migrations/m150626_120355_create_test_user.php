<?php

use yii\db\Migration;
use app\models\UserDb;

class m150626_120355_create_test_user extends Migration
{
    public function up()
    {
        $testUser = new UserDb();
        $testUser->username = 'admin';
        $testUser->setPassword('password');
        $testUser->generateAuthKey();
        $testUser->save();

    }

    public function down()
    {
        $user = UserDb::findByUsername('admin');
        $user ? $user->delete() : null;

        return true;
    }
}
