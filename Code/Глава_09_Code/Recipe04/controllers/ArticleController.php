<?php

namespace app\controllers;

use Yii;
use app\models\Article;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class ArticleController extends Controller
{
    public function actionIndex()
    {
        $query = Article::find()->with('category');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }
}
