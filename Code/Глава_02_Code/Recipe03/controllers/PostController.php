<?php

namespace app\controllers;

use yii\helpers\Html;
use yii\web\Controller;

class PostController extends Controller
{
    public function actionView($alias)
    {
        return $this->renderContent(Html::tag('h2',
            'Showing post with alias ' . Html::encode($alias)
        ));
    }

    public function actionIndex($type = 'posts', $order = 'DESC')
    {
        return $this->renderContent(Html::tag('h2',
            'Showing ' . Html::encode($type) . ' ordered ' . Html::encode($order)
        ));
    }

    public function actionHello($name)
    {
        return $this->renderContent(Html::tag('h2',
            'Hello, ' . Html::encode($name) . '!'
        ));
    }
}
