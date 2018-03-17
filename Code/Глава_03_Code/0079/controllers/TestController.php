<?php

namespace app\controllers;

use Yii;

use yii\web\Controller;


class TestController extends Controller
{

    public function actionUrls()
    {
        return $this->render('urls');
    }

}
