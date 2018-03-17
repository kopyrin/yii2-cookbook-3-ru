<?php

namespace app\controllers;

use yii\web\Controller;

class PortfolioController extends Controller
{
    public function actionIndex()
    {
        return $this->render('//site/content');
    }
}