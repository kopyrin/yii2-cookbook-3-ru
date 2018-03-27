<?php

namespace app\commands;

use yii\console\Controller;
use Yii;

class MailController extends Controller
{
    public function actionSend()
    {
        Yii::$app->mailer->compose()
            ->setTo('to@yii-book.app')
            ->setFrom(['from@yii-book.app' => Yii::$app->name])
            ->setSubject('My Test Message')
            ->setTextBody('My Text Body')
            ->send();
    }

    public function actionSendHtml()
    {
        $name = 'John';

        Yii::$app->mailer->compose('message-html', ['name' => $name])
            ->setTo('to@yii-book.app')
            ->setFrom(['from@yii-book.app' => Yii::$app->name])
            ->setSubject('My Test Message')
            ->send();
    }

    public function actionSendCombine()
    {
        $name = 'John';

        Yii::$app->mailer->compose(['html' => 'message-html', 'text' => 'message-text'], [
            'name' => $name,
        ])
            ->setTo('to@yii-book.app')
            ->setFrom(['from@yii-book.app' => Yii::$app->name])
            ->setSubject('My Test Message')
            ->send();
    }

    public function actionSendAttach()
    {
        Yii::$app->mailer->compose()
            ->setTo('to@yii-book.app')
            ->setFrom(['from@yii-book.app' => Yii::$app->name])
            ->setSubject('My Test Message')
            ->setTextBody('My Text Body')
            ->attach(Yii::getAlias('@app/README.md'))
            ->send();
    }
}
