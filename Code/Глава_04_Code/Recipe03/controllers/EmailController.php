<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\EmailForm;

class EmailController extends Controller
{

    public function actions()
    {
        return [
            'captcha' => [
                //'class' => 'yii\captcha\CaptchaAction',
                'class' => 'app\components\MathCaptchaAction',
                'minLength' => 1,
                'maxLength' => 10,
            ],
        ];
    }

    public function actionIndex()
    {
        $success = false;
        $model = new EmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            Yii::$app->session->setFlash('success', 'Success!');
        }
        return $this->render('index', [
            'model' => $model,
            'success' => $success,
        ]);

    }

}
