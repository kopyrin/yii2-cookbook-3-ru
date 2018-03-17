<?php

namespace app\controllers;

use yii\web\Controller;

class ArticleController extends Controller
{
    public $layout = 'articles';

    public function actionIndex()
    {
        return $this->render('//site/content');
    }
}