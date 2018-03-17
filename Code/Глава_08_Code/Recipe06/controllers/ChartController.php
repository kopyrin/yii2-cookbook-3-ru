<?php

namespace app\controllers;

use yii\base\Controller;

class ChartController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}