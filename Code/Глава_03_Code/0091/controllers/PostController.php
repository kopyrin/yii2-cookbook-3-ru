<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Post;

class PostController extends Controller
{
    public function actions()
    {
        return [
            'create' => [
                'class' => 'app\actions\CreateAction',
                'modelClass' => Post::className()
            ],
            'index' => [
                'class' => 'app\actions\IndexAction',
                'modelClass' => Post::className()
            ],
            'view' => [
                'class' => 'app\actions\ViewAction',
                'modelClass' => Post::className()
            ],
            'delete' => [
                'class' => 'app\actions\DeleteAction',
                'modelClass' => Post::className()
            ],
        ];
    }
}