<?php

namespace app\controllers;

use yii\web\Controller;

class LogController extends Controller
{
    public function actionIndex()
    {
        return 'Hello, ' . $_GET['username'];
    }
}
