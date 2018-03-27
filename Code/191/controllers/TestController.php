<?php

namespace app\controllers;

use app\models\Order;
use app\models\User;
use Yii;
use yii\web\Controller;


class TestController extends Controller
{
    public function actionOrder()
    {
        $user = new User();
        $order = new Order();

        if ($user->load(Yii::$app->request->post()) && $order->load(Yii::$app->request->post())) {
            if ($user->validate() && $order->validate()) {
                $user->save(false);
                $order->user_id = $user->id;
                $order->save(false);
                $this->redirect(['/test/result', 'id' => $order->id]);
            }
        }

        return $this->render('order', ['user' => $user, 'order' => $order]);
    }

    public function actionResult($id)
    {
        $order = Order::find($id)->with('product', 'user')->one();
        return $this->renderContent(
            'Product: ' . $order->product->title . '</br>' .
            'Price: ' . $order->product->price . '</br>' .
            'Customer: ' . $order->user->first_name . ' ' . $order->user->last_name . '</br>' .
            'Address: ' . $order->address
        );
    }

}