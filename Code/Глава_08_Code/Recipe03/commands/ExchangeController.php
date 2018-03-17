<?php

namespace app\commands;

use yii\console\Controller;

class ExchangeController extends Controller
{
    public function actionTest($currency, $date = null)
    {
        echo \Yii::$app->exchange->getRate('USD', $currency, $date) . PHP_EOL;
    }
}
