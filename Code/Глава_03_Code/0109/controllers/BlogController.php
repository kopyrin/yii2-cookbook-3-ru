<?php

namespace app\controllers;

use yii\web\Controller;

class BlogController extends Controller
{
    public function actionIndex()
    {
        $posts = [
            [
                'title' => 'First post',
                'content' => 'There\'s an example of reusing views with partials.'
            ],
            [
                'title' => 'Second post',
                'content' => 'We use twitter widget.'
            ],
        ];

        return $this->render('index', [
            'posts' => $posts
        ]);
    }
}
