<?php

namespace app\controllers;

use yii\web\Controller;

class BlogController extends Controller
{
    public $layout = 'blog';

    public function actionIndex()
    {
        return $this->render('//site/content');
    }
}