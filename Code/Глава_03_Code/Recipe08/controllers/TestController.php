<?php

namespace app\controllers;

use app\models\Account;
use Yii;

use yii\db\Exception;
use yii\helpers\VarDumper;
use yii\web\Controller;

class TestController extends Controller {

    public function actionSuccess()
    {
        $connection = Yii::$app->db;
        $transaction = $connection->beginTransaction();

        try {
            $recipient = Account::findOne(1);
            $sender = Account::findOne(2);

            $transferAmount = 177;
            $recipient->balance += $transferAmount;
            $sender->balance -= $transferAmount;

            if($sender->save() && $recipient->save()) {
                echo 'Money transfer was successfully';
                $transaction->commit();
}            else {
                $transaction->rollBack();

                throw new Exception('Money transfer failed: ' .
                    VarDumper::dumpAsString($sender->getErrors()) .
                    VarDumper::dumpAsString($recipient->getErrors())
                );
            }

        } catch(\Exception $e) {

            $transaction->rollBack();

            throw $e;
        }
    }

    public function actionError()
    {
        $connection = Yii::$app->db;
        $transaction = $connection->beginTransaction();

        try {
            $recipient = Account::findOne(1);
            $sender = Account::findOne(3);

            $transferAmount = 1000;
            $recipient->balance += $transferAmount;
            $sender->balance -= $transferAmount;

            if($sender->save() && $recipient->save()) {
                echo 'Money transfer was successfully';
                $transaction->commit();
            }
            else {
                $transaction->rollBack();

                throw new Exception('Money transfer failed: ' .
                    VarDumper::dumpAsString($sender->getErrors()) .
                    VarDumper::dumpAsString($recipient->getErrors())
                );
            }

        } catch(\Exception $e) {

            $transaction->rollBack();

            throw $e;
        }
    }
}