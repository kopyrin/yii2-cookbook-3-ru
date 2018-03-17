<?php

namespace app\controllers;

use yii\helpers\ArrayHelper;
use app\components\BaseController;

class TestController extends BaseController
{
    public function actions()
    {
        return ArrayHelper::merge(parent::actions(), [
            'page' => [
                'class' => 'yii\web\ViewAction',
            ],
        ]);
    }

    public function behaviors()
    {
        $behaviors = parent::behaviors();

        $rules = $behaviors['access']['rules'];

        $rules = ArrayHelper::merge(
            $rules,
            [
                [
                    'allow' => true,
                    'actions' => ['page']
                ]
            ]
        );

        $behaviors['access']['rules'] = $rules;

        return $behaviors;
    }

    public function actionIndex()
    {
        return $this->render('index');
    }
}
