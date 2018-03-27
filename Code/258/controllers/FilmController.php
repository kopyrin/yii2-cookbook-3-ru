<?php

namespace app\controllers;

use app\models\User;
use Yii;
use yii\helpers\ArrayHelper;
use yii\rest\ActiveController;
use yii\filters\auth\HttpBasicAuth;

class FilmController extends ActiveController
{
    public $modelClass = 'app\models\Film';

    public function behaviors()
    {
        return ArrayHelper::merge(parent::behaviors(), [
            'authenticator' => [
                'authMethods' => [
                    'basicAuth' => [
                        'class' => HttpBasicAuth::className(),
                        'auth' => function ($username, $password) {
                            $user = User::findByUsername($username);

                            if ($user !== null && $user->validatePassword($password)){
                                return $user;
                            }

                            return null;
                        },
                    ]
                ]
            ]

        ]);
    }
    
}
