<?php

namespace app\controllers;

use app\models\Article;
use yii\web\Controller;

class ErrorController extends Controller
{
    public function actionIndex()
    {
        $article = $this->findModel('php');

        return $article->title;
    }

    private function findModel($alias)
    {
        return Article::findOne(['allas' => $alias]);
    }
}
