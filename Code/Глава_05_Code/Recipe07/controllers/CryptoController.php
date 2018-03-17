<?php

namespace app\controllers;

use app\models\Order;
use yii\db\Query;
use yii\helpers\Html;
use yii\helpers\VarDumper;
use yii\web\Controller;

/**
 * Class CryptoController.
 */
class CryptoController extends Controller
{
    public function actionTest()
    {
        $newOrder = new Order();
        $newOrder->client = 'Alex';
        $newOrder->total = 100;
        $newOrder->encrypted_field = 'very-secret-info';
        $newOrder->save();

        $order = Order::findOne($newOrder->id);

        return $this->renderContent(
            Html::tag('h2', 'New model').
            Html::tag('pre', VarDumper::dumpAsString($newOrder->attributes)).
            Html::tag('h2', 'Found model').
            Html::tag('pre', VarDumper::dumpAsString($order->attributes))
        );
    }

    public function actionRaw()
    {
        $row = (new Query())->from('order')
            ->where(['client' => 'Alex'])
            ->one();

        return $this->renderContent(Html::tag('pre', VarDumper::dumpAsString($row)));
    }
}
