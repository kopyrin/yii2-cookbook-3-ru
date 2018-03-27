<?php

namespace app\controllers;

use app\models\User;
use app\components\AccessRule;
use yii\filters\AccessControl;
use yii\helpers\Html;
use yii\web\Controller;

class AccessController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                // We will override the default rule config with the new AccessRule class
                'ruleConfig' => [
                    'class' => AccessRule::className(),
                ],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['auth-only'],
                        'roles' => [User::ROLE_USER],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['ip'],
                        'ips' => ['127.0.0.1', '::1'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['user'],
                        'roles' => [User::ROLE_ADMIN],
                        'matchCallback' => function ($rule, $action) {
                            $isIE = preg_match('/MSIE 9/', $_SERVER['HTTP_USER_AGENT']);

                            return $isIE !== false;
                        },
                    ],
                    [
                        'allow' => false,
                    ],
                ],
            ],
        ];
    }

    public function actionAuthOnly()
    {
        return $this->renderContent(
            Html::tag('h2', 'Looks like you are authorized to run me.')
        );
    }

    public function actionIp()
    {
        return $this->renderContent(
            Html::tag('h2', 'Your IP is in our list. Lucky you!')
        );
    }

    public function actionUser()
    {
        return $this->renderContent(
            Html::tag('h2', 'You\'re the right man. Welcome!')
        );
    }
}
