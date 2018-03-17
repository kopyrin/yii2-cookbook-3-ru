<?php

namespace app\controllers;

use yii\web\Controller;

class TestController extends Controller
{
    public function actions()
    {
        return [
            'page' => [
                'class' => 'yii\web\ViewAction',
            ]
        ];
    }
}