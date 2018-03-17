<?php

namespace app\controllers;

use app\models\Article;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class BlogController extends Controller
{
    public function behaviors()
    {
        return [
            [
                'class' => 'yii\filters\HttpCache',
                'only' => ['index'],
                'lastModified' => function ($action, $params) {
                    return Article::find()->max('updated_at');
                },
            ],
            [
                'class' => 'yii\filters\HttpCache',
                'only' => ['view'],
                'etagSeed' => function ($action, $params) {
                        $article = $this->findModel(\Yii::$app->request->get('id'));
                        return serialize([$article->title, $article->text]);
                    },
            ],
        ];
    }

    public function actionIndex()
    {
        $articles = Article::find()->orderBy(['id' => SORT_DESC])->all();
        return $this->render('index', array(
            'articles' => $articles,
        ));
    }

    public function actionView($id)
    {
        $article = $this->findModel($id);
        return $this->render('view', array(
            'article' => $article,
        ));
    }

    public function actionCreate()
    {
        $n = rand(0, 1000);
        $article = new Article();
        $article->title = 'Title #' . $n;
        $article->text = 'Text #' . $n;
        $article->save();
        echo 'OK';
    }

    public function actionUpdate($id)
    {
        $article = $this->findModel($id);
        $n = rand(0, 1000);
        $article->title = 'Title #' . $n;
        $article->text = 'Text #' . $n;
        $article->save();
        echo 'OK';
    }

    /**
     * @param $id
     * @return Article
     * @throws \yii\web\NotFoundHttpException
     */
    private function findModel($id)
    {
        if (($model = Article::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}