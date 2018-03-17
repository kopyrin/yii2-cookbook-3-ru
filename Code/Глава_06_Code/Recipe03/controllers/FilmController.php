<?php

namespace app\controllers;

use yii\rest\ActiveController;
use app\models\User;
use yii\web\Response;

class FilmController extends ActiveController
{
    public $modelClass = 'app\models\Film';
    private $user;

    public function beforeAction($action)
    {
        $token = \Yii::$app->request->get('token');
        $this->user =  User::findIdentityByAccessToken($token);
        return parent::beforeAction($action);
    }

    public function behaviors()
    {
        return [
            'contentNegotiator' =>[
                'class' => \yii\filters\ContentNegotiator::className(),
                'formats'=> [
                    'application/json' => Response::FORMAT_JSON,
                ]
            ],
            'rateLimiter' => [
                'class' => \yii\filters\RateLimiter::className(),
                'enableRateLimitHeaders' => true,
                'user' => $this->user
            ],
        ];
    }

}